<?php
/** 用户注册 **/

// load php methods
require('../app/methods.php');

$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$json = null;

session_start();
header("Content-Type: application/json; charset=UTF-8");


if(!filled_out($_POST)) {
    $json = array('data' => array(
        'msg' => '请填写完整表单',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

if($password.length < 6 && $password.length > 16) {
    $json = array('data' => array(
        'msg' => '密码长度在 6~16 位之间',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

if($password !== $password1) {
    $json = array('data' => array(
        'msg' => '密码不一致',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

$db = db_connect();
// 查询用户是否存在
$sel_reg_query = "SELECT * FROM register WHERE email = '".$email."'";
$sel_reg_result = $db->query($sel_reg_query);

if(!$sel_reg_result) {
    $json = array('data' => array(
        'msg' => '数据库出错',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
};

if($sel_reg_result->num_rows > 0) {
    $json = array('data' => array(
        'msg' => '邮箱已经被注册了',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

// 插入注册信息
$insert_reg_query = 'INSERT INTO register VALUES(NULL, "'.$email.'", sha1("'.$password.'"), now())';
$reg_res = $db->query($insert_reg_query);
$user_id = $db->insert_id;

// 插入用户信息
$insert_user_info_query = 'INSERT INTO user_info SET user_id = "'.$user_id.'", user_nickname = "'.$nickname.'"';
$user_info_res = $db->query($insert_user_info_query);

if($reg_res && $user_info_res) {
    $json = array('data' => array(
        'msg' => '注册成功！',
        'code' => 1
    ));
    echo json_encode($json);
}else {
    $json = array('data' => array(
        'msg' => '注册失败！',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}