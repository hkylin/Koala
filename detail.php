<?php
require('app.php');

$user_post = array();

check_auth_user();
$user_id = $_GET['user_id'];

$user_info = get_user_info($user_id);
$post = get_post('user', $user_id);

//$smarty->assign('isMe', true);
$smarty->assign('user_info', $user_info);
$smarty->assign('post', $post);

$smarty->display('detail.tpl');