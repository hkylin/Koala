<?php

require './includes/gestbook/setup.php';
require './manage/app/methods.php';

session_start();

$smarty = new Smarty_Setup();

$is_login = false;

if(isset($_SESSION['valid_user'])) {
    $is_login = true;
}

// 设置一些传入模板的参数
$smarty->assign('isLogin', $is_login);