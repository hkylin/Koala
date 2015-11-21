{extends file="base.tpl"}

{block name="title"}
  <title>完善{$user_info['u_nickname']}的个人资料</title>
{/block}


{block name="Stylesheet"}
  <link rel="stylesheet" href="{IMPORT_RESOURCES imgServer='/stylesheets/login.css'}" />
{/block}

{block name="body"}
  <div class="main">
    <div class="profile-area">
      <div class="card-wrap card login-card">
        <form id="profile_form" action="manage/api/profile_api.php" method="post" enctype="multipart/form-data" target="upload_target">
          <legend class="login-legend fw-b">完善树袋熊</legend>
          <p id="tip" class="alert" style="display: none;"></p>
          <div class="form-group">
            <fieldset class="form-group">
              <div class="avatar-hodler pull-left">
                <img src="{$user_info['u_avatar']}" />
              </div> 
              <label for="avatar">上传头像</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
              <input id="avatar" type="file" name="avatar" class="form-control-file" />
              <small class="text-muted">只支持JPG、PNG、GIF，大小不超过3M</small>
            </fieldset>
            <fieldset class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" name="nickname" type="text" class="form-control" placeholder="您的昵称" value="{$user_info['u_nickname']}" />
            </fieldset>
            <fieldset class="form-group">
              <label for="name">真实姓名</label>
              <input id="name" name="name" type="text" class="form-control" value="{$user_info['u_name']}" placeholder="您的真实姓名">
              <small class="text-muted">我们不会将您的信息透露给任何人。</small>
            </fieldset>
            <fieldset class="form-group">
              <label class="pull-left">性别&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="radio">
                <label>
                  <input name="gender" type="radio" value="male" id="male" {if $user_info['u_gender'] === 'male'}checked{/if} />
                  男
                </label>
                &nbsp;
                <label>
                  <input name="gender" type="radio" value="female" id="female" class="with-gap" {if $user_info['u_gender'] === 'female'}checked{/if} />
                  女
                </label>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <label for="mydesc">自我简介</label>
              <textarea id="mydesc" name="mydesc" class="form-control" rows="3" value="{$user_info['mydesc']}">{$user_info['u_mydesc']}</textarea>
            </fieldset>
            <fieldset class="form-group">
              <a class="btn btn-danger" href="#changepsd" data-toggle="ST-modal" data-target="#popup" ST-type="changepsd">修改密码</a>
            </fieldset>
            <div class="txtalg-c">
              <button type="submit" class="btn btn-accent">保存</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
{/block}

{block name="scripts"}
  <script type="text/javascript" data-main="{IMPORT_RESOURCES imgServer='/scripts/pages/profile'}" src="{IMPORT_RESOURCES imgServer='/scripts/lib/require.js'}"></script>
{/block}