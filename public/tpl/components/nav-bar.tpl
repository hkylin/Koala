<div class="ST-nav">
  <div class="ST-navbar wrap">

    {* logo *}
    <div class="ST-logo">
      <a href="/">
        <span class="logo"></span>
      </a>
    </div>

    <div class="search-wrap pull-left">
      <form class="form-inline" action="/search_result" method="post">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="搜索" />
          <div class="input-group-addon search-btn" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>

    <div class="gb-profile">
    {if $isLogin === false}
      <a href="/login">登陆</a>
      <a href="/register">注册</a>
    {else}
      <a href="#!"><i class="fa fa-user"></i><span>musicq</span></a>
      <a href="/profile"><i class="fa fa-cog"></i><span>个人信息</span></a>
      <a href="/#logout" id="logout"><i class="fa fa-power-off"></i><span>退出</span></a>
    {/if}
    </div>
  </div>
</div>