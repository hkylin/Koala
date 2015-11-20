<div class="post-holder card">
  {* 上传照片 *}
  <form id="media_upload_form" method="post" enctype="multipart/form-data" style="width: 0; height: 0;visibility: hidden;">
    {* <input type="hidden" name="MAX_FILE_SIZE" value="5000000" /> *}
    <input type="file" name="media_file" />
    <button type="submit"></button>
  </form>

  {* 上传 post *}
  <form id="publish_form">
    <p id="ST_tip" class="alert" style="display: none;"></p>
    <div class="publish-title">
      <p class="yo">不吐不快！赶紧把你压抑在心底的负能量大声喊出来吧！</p>
    </div>
    <div class="publish-textbox">
      <textarea class="post-textbox" title="吐槽能量框"></textarea>
    </div>
    <div class="media_box">
      <ul class="media_post_holder">
        {* media 模板 *}
        {* <li class="media_post_item">
          <img src="/public/upload/13/media/d7c2c544c77dcb64add907dfb2975c0a.png" alt="" />
          <a class="opr" href="javascript:void(0);">x</a>
          <div class="overlay"></div>
        </li> *}
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
</div>