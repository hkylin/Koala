<?php
require('app.php');

// 得到主页 post 数据
$post = get_post();

$smarty->assign('post', $post);
$smarty->display('index.tpl');