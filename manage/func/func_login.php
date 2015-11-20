<?php
/** 用户登录 **/

// load php methods
require('../app/methods.php');

$email = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember'];
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

$sel_reg_query = "SELECT * FROM register WHERE email = '".$email."' AND password = sha1('".$password."')";
$sel_reg_result = get_data($sel_reg_query);

if(!$sel_reg_result) {
    $json = array('data' => array(
        'msg' => '数据库出错',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

if($sel_reg_result->num_rows > 0) {
    $json = array('data' => array(
        'msg' => '登录成功！',
        'code' => 1,
        'remember' => $remember
    ));
    echo json_encode($json);

    // 将用户加入 session 中
    $_SESSION['valid_user'] = $email;
} else {
    $json = array('data' => array(
        'msg' => '用户名或者密码错误！',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}