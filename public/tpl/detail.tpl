{extends file="base.tpl"}

{block name="title"}
  <title>{$user_info['user_nickname']}_{$app_name}</title>
{/block}

{block name="Stylesheet"}
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/index.css'}" />
{/block}

{block name="body"}
  <div class="main">

    {include file="components/feed.tpl"}

  </div>
{/block}


{block name="scripts"}
{* <script type="text/javascript" data-main="{IMPORT_RESOURCES imgServer='/scripts/pages/detail'}" src="{IMPORT_RESOURCES imgServer='/scripts/lib/require.js'}"></script> *}
<script type="text/javascript" src="{IMPORT_RESOURCES imgServer='/dist/scripts/pages/detail.js'}"></script>
{/block}