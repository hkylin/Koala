<?php /* Smarty version 3.1.27, created on 2015-11-20 06:35:29
         compiled from "/Applications/MAMP/htdocs/public/tpl/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1503581701564eb121837804_56970704%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b944f0864eb86d3926340ec1e72a9f7a1f7e137' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/index.tpl',
      1 => 1447905005,
      2 => 'file',
    ),
    '010f63ceda076b7c35d9de11095db91e57c2edf9' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/base.tpl',
      1 => 1447986413,
      2 => 'file',
    ),
    '82bf44a0def66157f5ec5a0c3045a81df935f2c0' => 
    array (
      0 => '82bf44a0def66157f5ec5a0c3045a81df935f2c0',
      1 => 0,
      2 => 'string',
    ),
    'ef3b857bdbcb5f55d5e65e97c5720dd3a832e803' => 
    array (
      0 => 'ef3b857bdbcb5f55d5e65e97c5720dd3a832e803',
      1 => 0,
      2 => 'string',
    ),
    '406a3afe5bd6bf8068d30dce85bbccfe0bc3768d' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/components/post_box.tpl',
      1 => 1447997728,
      2 => 'file',
    ),
    '3b09fbc9a9549df666bdca867a508512b06f5e95' => 
    array (
      0 => '/Applications/MAMP/htdocs/public/tpl/components/feed.tpl',
      1 => 1447986308,
      2 => 'file',
    ),
    'a95fce650b578b43964f15b80ef1d399a8b17d9c' => 
    array (
      0 => 'a95fce650b578b43964f15b80ef1d399a8b17d9c',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1503581701564eb121837804_56970704',
  'variables' => 
  array (
    'app_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564eb121965d16_16052269',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564eb121965d16_16052269')) {
function content_564eb121965d16_16052269 ($_smarty_tpl) {
if (!is_callable('smarty_function_IMPORT_RESOURCES')) require_once '/Applications/MAMP/htdocs/includes/gestbook/libs/plugins/function.IMPORT_RESOURCES.php';

$_smarty_tpl->properties['nocache_hash'] = '1503581701564eb121837804_56970704';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  
  
    <title><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
  

  
  
  
  <link rel="SHORTCUT ICON" href="favicon.ico" />
  <link rel="stylesheet" href="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/stylesheets/main.css'),$_smarty_tpl);?>
" />
  
  <?php
$_smarty_tpl->properties['nocache_hash'] = '1503581701564eb121837804_56970704';
?>

  <link rel="stylesheet" href="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/stylesheets/index.css'),$_smarty_tpl);?>
" />

</head>
<body>
  
  <?php echo $_smarty_tpl->getSubTemplate ("components/nav_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


  
  <div class="container wrap">
    <?php
$_smarty_tpl->properties['nocache_hash'] = '1503581701564eb121837804_56970704';
?>

  <div class="main">
    
    
    <?php if ($_smarty_tpl->tpl_vars['isLogin']->value === true) {?>
      <?php /*  Call merged included template "components/post_box.tpl" */
echo $_smarty_tpl->getInlineSubTemplate("components/post_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '256514880564eb1218ed0a3_62657716', 'content_564eb1218ec6b0_54002395');
/*  End of included template "components/post_box.tpl" */?>

    <?php }?>

    
    <?php /*  Call merged included template "components/feed.tpl" */
echo $_smarty_tpl->getInlineSubTemplate("components/feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '16699527564eb1218fdea8_52076636', 'content_564eb1218fd633_48034759');
/*  End of included template "components/feed.tpl" */?>

    
  </div>

  </div>

  
  <?php echo $_smarty_tpl->getSubTemplate ("components/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


  
  <?php echo $_smarty_tpl->getSubTemplate ("components/modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

  
  
  <?php
$_smarty_tpl->properties['nocache_hash'] = '1503581701564eb121837804_56970704';
?>

<?php echo '<script'; ?>
 type="text/javascript" data-main="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/scripts/pages/index'),$_smarty_tpl);?>
" src="<?php echo smarty_function_IMPORT_RESOURCES(array('imgServer'=>'/scripts/lib/require.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?><?php
/*%%SmartyHeaderCode:256514880564eb1218ed0a3_62657716%%*/
if ($_valid && !is_callable('content_564eb1218ec6b0_54002395')) {
function content_564eb1218ec6b0_54002395 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '256514880564eb1218ed0a3_62657716';
?>
<div class="post-holder card">
  
  <form id="media_upload_form" method="post" enctype="multipart/form-data" style="width: 0; height: 0;visibility: hidden;">
    
    <input type="file" name="media_file" />
    <button type="submit"></button>
  </form>

  
  <form id="publish_form">
    <p id="ST_tip" class="alert" style="display: none;"></p>
    <div class="publish-title">
      <p class="yo">不吐不快！赶紧把你压抑在心底的负能量大声喊出来吧！</p>
    </div>
    <div class="publish-textbox">
      <div class="post-textbox-fake">
        <div class="ps-box">
          <div class="ps-inner">
            <i class="fa fa-check-circle-o"></i>
            <span>发布成功</span>
          </div>
        </div>
      </div>
      <div class="post-textbox-wrap">
        <textarea class="post-textbox" title="吐槽能量框"></textarea>
      </div>
    </div>
    <div class="media_box">
      <ul class="media_post_holder">
        
        
      </ul>
    </div>
    <div class="publish-options clr">
      <div class="media-upload pull-left">
        <div class="media-holder">
          <a href="javascript:void(0);" class="media-btn">
            <i class="fa fa-picture-o"></i>
            图片
          </a>
        </div>
      </div>
      <div class="send-btn pull-right">
        <button id="send_btn" class="btn btn-accent" type="submit">发射吐槽能量
          <i class="fa fa-send-o"></i>
        </button>
      </div>
    </div>
  </form>
</div><?php
/*/%%SmartyNocache:256514880564eb1218ed0a3_62657716%%*/
}
}
?><?php
/*%%SmartyHeaderCode:16699527564eb1218fdea8_52076636%%*/
if ($_valid && !is_callable('content_564eb1218fd633_48034759')) {
function content_564eb1218fd633_48034759 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '16699527564eb1218fdea8_52076636';
?>
<div class="ST-feed">
  <div class="feed-wrap">
  <?php
$_from = $_smarty_tpl->tpl_vars['post']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
    <div class="card card-wrap" <?php if ($_smarty_tpl->tpl_vars['item']->value['isMe'] === true) {?>data-st="<?php echo $_smarty_tpl->tpl_vars['item']->value['post_id'];?>
"<?php }?>>
      <div class="avatar pull-left">
        <a href="/detail/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['user_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['avatar'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['user_nickname'];?>
"></a>
      </div>
      <div class="ST-detail">
        <div class="ST-info">
          <a href="/detail/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['user_id'];?>
" class="ST-txt fz-14 fw-b"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['user_nickname'];?>
</a>
        </div>
        <div class="ST-txt" data-type="ST-message">
          <?php echo $_smarty_tpl->tpl_vars['item']->value['post'];?>

        </div>
        <div class="ST-media-box">
          <ul class="ST-media">
            <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['media'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['media'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['media']->_loop = false;
$_smarty_tpl->tpl_vars['m_key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['m_key']->value => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
$foreach_media_Sav = $_smarty_tpl->tpl_vars['media'];
?>
              <li class="ST-pic s-img">
                <img action-type="pic_to_bg" class="bg-cursor" src="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['post'];?>
" />
              </li>
            <?php
$_smarty_tpl->tpl_vars['media'] = $foreach_media_Sav;
}
?>
          </ul>
        </div>
        <div class="ST-expend-media-box"></div>
      </div>
      <div class="post-datetime">
        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['post_date'];?>
</span>
      </div>
      <?php if ($_smarty_tpl->tpl_vars['item']->value['isMe'] === true) {?>
      <div class="post-opration">
        <div class="dropdown">
          <a class="dropdown-btn" data-toggle="dropdown" href="javascript:void(0);">
            <i class="fa fa-chevron-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#edit" data-toggle="ST-modal" data-target="#popup" ST-type="edit">编辑</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item danger" href="#delete" data-toggle="ST-modal" data-target="#popup" ST-type="delete">删除</a>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
  </div>
</div>
<?php
/*/%%SmartyNocache:16699527564eb1218fdea8_52076636%%*/
}
}
?>