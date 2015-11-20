<?php
require('app.php');

$search = trim($_POST['search']);

$post = get_post('search', $search);

$smarty->assign('post', $post);


$smarty->assign('keyword', $search);
$smarty->assign('isMe', false);
$smarty->display('search_result.tpl');
