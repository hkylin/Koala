<?php
/**
 * 网站后台方法集合
 */

// load 网站常量
require($_SERVER['DOCUMENT_ROOT'] . '/includes/gestbook/smarty_const.php');
// load 表单验证方法
require('data_valid_fns.php');
// load 数据库操作方法
require('db.php');
// load 用户验证方法
require('user_auth_fns.php');
// load 数据库交互方法
require('interactive.php');
// load 图片处理方法
require('img_url_handle.php');