{extends file="base.tpl"}

{block name="title"}
  <title>{$app_name}_注册</title>
{/block}

{block name="Stylesheet"}
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/login.css'}" />
{/block}

{block name="body"}
  <div class="main">
    <div class="login-area">
      <div class="card-wrap card login-card">
        <form id="register_form" method="post">
          <legend class="login-legend fw-b">注册树袋熊</legend>
          <p id="ST_tip" class="alert" style="display: none;"></p>
          <div class="form-group">
            <fieldset class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" name="nickname" type="text" class="form-control" placeholder="您的昵称">
            </fieldset>
            <fieldset class="form-group">
              <label for="exampleInputEmail1">邮箱</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="您的邮箱">
              <small class="text-muted">我们不会将您的邮箱透露给任何人。</small>
            </fieldset>
            <fieldset class="form-group">
              <label for="password">密码</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="密码">
            </fieldset>
            <fieldset class="form-group">
              <label for="password1">确认密码</label>
              <input name="password1" type="password" class="form-control" id="password1" placeholder="确认密码">
            </fieldset>
            <div class="txtalg-c">
              <button type="submit" class="btn btn-accent">注册</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-bottom">
        <p class="txtalg-c">已经有账号了？</p>
        <p><a class="btn w100 btn-accent" href="login">马上登录</a></p>
      </div>
    </div>
  </div>
{/block}

{block name="scripts"}
<script type="text/javascript" data-main="{IMPORT_RESOURCES imgServer='/scripts/pages/register'}" src="{IMPORT_RESOURCES imgServer='/scripts/lib/require.js'}"></script>
{/block}