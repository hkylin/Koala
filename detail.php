<?php
require('app.php');

$user_post = array();

$user_id = $_GET['user_id'];

$user_info = get_user_info($user_id);
$post = get_post('user', $user_id);

$smarty->assign('user_info', $user_info);
$smarty->assign('post', $post);

$smarty->display('detail.tpl');