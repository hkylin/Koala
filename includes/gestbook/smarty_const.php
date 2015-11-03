<?php
/**
 * 存放网站的常量文件
 */

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
// 文档根路径
define('DOMROOT', $_SERVER['DOCUMENT_ROOT']);
// 网站目录
define('SITEROOT', $root);
// 模板路径
define('TPL_DIR', DOMROOT.'/public/tpl');
// 模板缓存路径
define('TPL_C', DOMROOT.'/public/tpl_c');
// 静态资源路径
define('RES_DIR', '/public/static');