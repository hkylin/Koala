{extends file="base.tpl"}

{block name="title"}
  <title>{$app_name}_登录</title>
{/block}

{block name="Stylesheet"}
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/login.css'}" />
{/block}

{block name="body"}
  <div class="main">
    <div class="login-area">
      <div class="card-wrap card login-card">
        <form id="login_form" method="post">
          <legend class="login-legend fw-b">登录树袋熊</legend>
          <p id="ST_tip" class="alert" style="display: none;"></p>
          <div class="form-group">
            <fieldset class="form-group">
              <label for="exampleInputEmail1">邮箱</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="您的邮箱">
              <small class="text-muted">我们不会将您的邮箱透露给任何人。</small>
            </fieldset>
            <fieldset class="form-group">
              <label for="exampleInputPassword1">密码</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="密码">
            </fieldset>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="remember" checked>&nbsp;记住我
              </label>
            </div>
            <div class="txtalg-c">
              <button type="submit" class="btn btn-accent">登录</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-bottom">
        <p class="txtalg-c">还没有属于自己的账号吗？</p>
        <p><a class="btn w100 btn-accent" href="register">立即注册</a></p>
      </div>
    </div>
  </div>
{/block}

{block name="scripts"}
{* <script type="text/javascript" data-main="{IMPORT_RESOURCES imgServer='/scripts/pages/login'}" src="{IMPORT_RESOURCES imgServer='/scripts/lib/require.js'}"></script> *}
<script type="text/javascript" src="{IMPORT_RESOURCES imgServer='/dist/scripts/pages/login.js'}"></script>
{/block}
