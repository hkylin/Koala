<?php
/** 修改个人信息 **/

// load php methods
require('../app/methods.php');

$json = null;
$nickname = $_POST['nickname'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$mydesc = $_POST['mydesc'];

session_start();
header('Content-Type: application/json; charset=UTF-8');

check_auth_user();

$user_id = get_user_id($_SESSION['valid_user']);

// 上传头像
$file_name = 'avatar';
if(!empty($_FILES[$file_name]['name'])) {
    $avatar_addr = img_url_handle::media_upload($file_name, $file_name, 'avatar');
}

// 储存数据
$db = db_connect();
$sel_query = 'SELECT * FROM user_info WHERE user_id = "'.$user_id.'"';
$sel_res = $db->query($sel_query);

// 如果已经存在个人信息，则更新个人信息
if($sel_res->num_rows > 0) {
    if(!empty($_FILES['avatar']['name'])) {
        $query = 'UPDATE user_info
                  SET user_name = "'.$name.'",
                      user_nickname = "'.$nickname.'",
                      avatar = "'.$avatar_addr.'",
                      gender = "'.$gender.'",
                      mydesc = "'.$mydesc.'"
                  WHERE user_id = "'.$user_id.'"
                  ';
    } else {
        $query = 'UPDATE user_info
                  SET user_name = "'.$name.'",
                      user_nickname = "'.$nickname.'",
                      gender = "'.$gender.'",
                      mydesc = "'.$mydesc.'"
                   WHERE user_id = "'.$user_id.'"
                  ';
    }

    $result = $db->query($query);

    if(!$result) {
        $json = array('data' => array(
            'msg' => '数据库出错',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }

    $json = array('data' => array(
        'msg' => '修改成功',
        'code' => 1,
        'user_info' => array(
            'user_id' => $user_id,
            'user_name' => $name,
            'user_nickname' => $nickname,
            'avatar' => $avatar_addr,
            'gender' => $gender,
            'mydesc' => $mydesc
        )
    ));
    echo json_encode($json);
} else {
    // 若不存在个人信息，则插入数据
    if(!empty($_FILES['avatar']['name'])) {
        $query = 'INSERT INTO user_info VALUES ("'.$user_id.'", "'.$name.'", "'.$nickname.'", "'.$avatar_addr.'", "'.$gender.'", NULL, "'.$mydesc.'")';
    } else {
        $query = 'INSERT INTO user_info VALUES ("'.$user_id.'", "'.$name.'", "'.$nickname.'", NULL, "'.$gender.'", NULL, "'.$mydesc.'")';
    }
    $result = $db->query($query);

    if(!$result) {
        $json = array('data' => array(
            'msg' => '数据库出错',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }

    // 上传成功返回 json
    $json = array('data' => array(
        'msg' => '上传成功',
        'code' => 1,
        'user_info' => array(
            'user_id' => $user_id,
            'user_name' => $name,
            'user_nickname' => $nickname,
            'avatar' => $avatar_addr,
            'gender' => $gender,
            'mydesc' => $mydesc
        )
    ));
    echo json_encode($json);
}