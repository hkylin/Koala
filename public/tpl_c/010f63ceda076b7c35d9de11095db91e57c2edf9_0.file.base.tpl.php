<?php /* Smarty version 3.1.27, created on 2015-11-03 07:29:33
         compiled from "/Applications/MAMP/htdocs/public/tpl/base.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6263462025638544dddd127_54892005%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '010f63ceda076b7c35d9de11095db91e57c2edf9' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/base.tpl',
      1 => 1446532172,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6263462025638544dddd127_54892005',
  'variables' => 
  array (
    'app_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5638544de3e422_30287442',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5638544de3e422_30287442')) {
function content_5638544de3e422_30287442 ($_smarty_tpl) {
if (!is_callable('smarty_function_IMPORT_RESOURCES')) require_once '/Applications/MAMP/htdocs/includes/gestbook/libs/plugins/function.IMPORT_RESOURCES.php';

$_smarty_tpl->properties['nocache_hash'] = '6263462025638544dddd127_54892005';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  
    <title>
      <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>

    </title>
  
  <link rel="stylesheet" href="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/style/main.css'),$_smarty_tpl);?>
" />
</head>
<body>

  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/scripts/main.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>