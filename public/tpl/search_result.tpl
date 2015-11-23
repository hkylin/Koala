{extends file="base.tpl"}

{block name="title"}
  <title>{$app_name}_搜索结果</title>
{/block}

{block name="Stylesheet"}
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/index.css'}" />
{/block}

{block name="body"}
  <div class="main">
    <div class="alert alert-info" role="alert">
      关键词：『<strong> {$keyword} </strong>』的搜索结果如下
    </div>
    {include file="components/feed.tpl"}

  </div>
{/block}

{block name="scripts"}
{* <script type="text/javascript" data-main="{IMPORT_RESOURCES imgServer='/scripts/pages/index'}" src="{IMPORT_RESOURCES imgServer='/scripts/lib/require.js'}"></script> *}
<script type="text/javascript" src="{IMPORT_RESOURCES imgServer='/dist/scripts/pages/index.js'}"></script>
{/block}
