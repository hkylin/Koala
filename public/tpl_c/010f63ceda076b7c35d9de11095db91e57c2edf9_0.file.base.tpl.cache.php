<?php /* Smarty version 3.1.27, created on 2015-11-03 02:37:07
         compiled from "/Applications/MAMP/htdocs/public/tpl/base.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:163963422556380fc3ed6531_48290987%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '010f63ceda076b7c35d9de11095db91e57c2edf9' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/base.tpl',
      1 => 1446514627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163963422556380fc3ed6531_48290987',
  'variables' => 
  array (
    'app_name' => 0,
    'res_dir' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56380fc3f1b783_76784043',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56380fc3f1b783_76784043')) {
function content_56380fc3f1b783_76784043 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '163963422556380fc3ed6531_48290987';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['res_dir']->value;?>
/style/main.css" />
</head>
<body>

  <h1><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h1>
  <p><?php echo $_smarty_tpl->tpl_vars['res_dir']->value;?>
</p>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['res_dir']->value;?>
/scripts/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>