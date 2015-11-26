<div class="post-holder card">
  {* 上传照片 *}
  <form id="media_upload_form" method="post" enctype="multipart/form-data" style="width: 0; height: 0;visibility: hidden;">
    <input type="file" name="media_file" />
    <button type="submit"></button>
  </form>

  {* 上传 post *}
  <form id="publish_form">
    <p id="ST_tip" class="alert" style="display: none;"></p>
    <div class="title-area">
      <p>不吐不快！赶紧把你压抑在心底的负能量大声喊出来吧！</p>
    </div>
    <div class="publish">
      <div class="post-wrap">
        <textarea class="post-textbox" title="吐槽能量框"></textarea>
        <div class="ps-box">
          <div class="ps-inner">
            <i class="fa fa-check-circle-o"></i>
            <span>发布成功</span>
          </div>
        </div>
      </div>
    </div>
    <div class="publish-media">
      <ul class="post-media-holder">
        {* media 模板 *}
        {* <li class="post-media-item">
          <img src="/public/upload/13/media/d7c2c544c77dcb64add907dfb2975c0a.png" alt="" />
          <a class="close" href="javascript:void(0);"><i class="fa fa-times"></i></a>
          <div class="overlay"></div>
        </li> *}
      </ul>
    </div>
    <div class="publish-options clr">
      <div class="pic-upload pull-left">
        <div class="media-type">
          <a href="javascript:void(0);" action-type="pic-upload">
            <i class="fa fa-picture-o"></i>
            图片
          </a>
        </div>
      </div>
      <div class="pull-right">
        <button id="post_btn" class="btn btn-accent" type="submit">发射吐槽能量
          <i class="fa fa-send-o"></i>
        </button>
      </div>
    </div>
  </form>
</div>