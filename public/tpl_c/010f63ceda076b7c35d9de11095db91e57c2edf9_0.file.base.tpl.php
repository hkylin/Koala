<?php /* Smarty version 3.1.27, created on 2015-11-03 03:46:13
         compiled from "/Applications/MAMP/htdocs/public/tpl/base.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:145356600356381ff5ee2836_45485823%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '010f63ceda076b7c35d9de11095db91e57c2edf9' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/base.tpl',
      1 => 1446518773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145356600356381ff5ee2836_45485823',
  'variables' => 
  array (
    'app_name' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56381ff5f2c913_07182097',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56381ff5f2c913_07182097')) {
function content_56381ff5f2c913_07182097 ($_smarty_tpl) {
if (!is_callable('smarty_function_IMPORT_RESOURCES')) require_once '/Applications/MAMP/htdocs/includes/gestbook/libs/plugins/function.IMPORT_RESOURCES.php';

$_smarty_tpl->properties['nocache_hash'] = '145356600356381ff5ee2836_45485823';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
  <link rel="stylesheet" href="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/style/main.css'),$_smarty_tpl);?>
" />
</head>
<body>

  <h1><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h1>
  <p><?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/style/main.css'),$_smarty_tpl);?>
</p>

  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/scripts/main.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>