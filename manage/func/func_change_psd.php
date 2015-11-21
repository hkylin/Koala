<?php
/** 修改密码 **/

// load php methods
require('../app/methods.php');

$json = null;
$oldpsd = $_POST['oldpsd'];
$newpsd = $_POST['newpsd'];
$newpsd1 = $_POST['newpsd1'];


session_start();
header("Content-Type: application/json; charset=UTF-8");

check_auth_user();
if($newpsd !== $newpsd1 || strlen($newpsd) < 6 || strlen($newpsd) > 16) {
    $json = array('data' => array(
        'msg' => '密码不一致, 或者长度不在 6-16 个字符之间',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}
if($oldpsd === $newpsd) {
    $json = array('data' => array(
        'msg' => '修改的密码不能更原来密码一样',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

$user_id = get_user_id($_SESSION['valid_user']);
$sel_query = 'SELECT * FROM register WHERE user_id = "'.$user_id.'" AND password = sha1("'.$oldpsd.'")';
$sel_res = get_data($sel_query);

if(!$sel_res->num_rows) {
    $json = array('data' => array(
        'msg' => '密码错误',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}


$updatepsd_query = 'UPDATE register SET password = sha1("'.$newpsd.'") WHERE user_id = "'.$user_id.'"';
$updatepsd_res = get_data($updatepsd_query);

$json = array('data' => array(
    'msg' => '密码修改成功',
    'code' => 1
));
echo json_encode($json);