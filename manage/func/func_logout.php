<?php
/** 用户登出 **/

// load php methods
require('../app/methods.php');

$json = null;

session_start();

check_auth_user();

// 销毁会话
session_destroy();
unset($action);
$_SESSION = array();

header("Content-Type: application/json; charset=UTF-8");

$json = array('data' => array(
    'msg' => '成功退出！',
    'code' => 1
));

echo json_encode($json);