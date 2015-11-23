<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  {* 标题 *}
  {block name="title"}
    <title>{$app_name}</title>
  {/block}

  {* 一些头部内容 *}
  {block name="head"}{/block}
  
  <link rel="SHORTCUT ICON" href="favicon.ico" />
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/main.css'}" />
  {* css *}
  {block name="Stylesheet"}{/block}
</head>
<body>
  {* 导航栏 *}
  {include file="components/nav_bar.tpl"}

  {* body *}
  <div class="container wrap">
    {block name="body"}{/block}
  </div>

  {* 页脚 *}
  {include file="components/footer.tpl"}

  {* modal *}
  {include file="components/modal.tpl"}
  
  <script type="text/javascript" src="{IMPORT_RESOURCES imgServer='/dist/scripts/pages/base.js'}"></script>
  {* 脚本 *}
  {block name="scripts"}{/block}
</body>
</html>
