{extends file="base.tpl"}

{block name="Stylesheet"}
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/index.css'}" />
{/block}

{block name="body"}
  <div class="main">
    
    {* 发送框 *}
    {if $isLogin === true}
      {include file="components/post_box.tpl"}
    {/if}

    {* 动态替换 *}
    {include file="components/feed.tpl"}
    
  </div>
{/block}

{block name="scripts"}
{* <script type="text/javascript" data-main="{IMPORT_RESOURCES imgServer='/scripts/pages/index'}" src="{IMPORT_RESOURCES imgServer='/scripts/lib/require.js'}"></script> *}
<script type="text/javascript" src="{IMPORT_RESOURCES imgServer='/dist/scripts/pages/index.js'}"></script>
{/block}