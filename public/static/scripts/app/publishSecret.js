define(['jquery'], function($) {

// 发布信息
$(function() {
  var $publishForm = $('#publish_form'),
      $postTextbox = $publishForm.find('.post-textbox'),
      $sendBtn = $('#send_btn'),
      $mediaBtn = $('.media-btn'),
      $mediaUploadForm = $('#media_upload_form'),
      $postImgInp = $mediaUploadForm.find('input[type="file"]'),
      $media_url = [], // 储存上传媒体文件的 url
      $tip = $('#ST_tip'),
      animateTime = 300;

  // 计算字数
  checkLength();
  $postTextbox.on('keyup', function(e) {
    checkLength();
  });

  // 弹出 upload 框
  $mediaBtn.on('click', function(e) {
    e.preventDefault();
    $postImgInp.trigger('click');
  });

  // ajax 上传图片，采用 html5 的 files 接口
  $postImgInp.on('change', function(e) {
    var file_data = $postImgInp.prop('files')[0],
        form_data = new FormData();
    form_data.append('media_file', file_data);

    $.ajax({
      url: 'manage/api/media_upload',
      method: 'POST',
      data: form_data,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res) {
        var M = res.data,
            msg = M.msg,
            code = M.code,
            media_url = M.upload_url;
        if( !code ) {
          $tip.html(msg).addClass('alert-warning').slideDown(animateTime);
          return false;
        }
        addMedia(media_url);
        $media_url.push(media_url);
      },
      error: function(e) {
        $tip.html('图片上传失败了~').addClass('alert-warning').slideDown(animateTime);
        console.log(e);
      }
    });
  });


  // 发布框
  $publishForm.on('submit', function(e) {
    e.preventDefault();
    var $postContent = $postTextbox.val().trim();
    var data = { post_content: $postContent, media_url: $media_url};

    $.ajax({
      url: 'manage/api/post',
      method: 'POST',
      data: data,
      success: function(res) {
        var M = res.data,
            msg = M.msg,
            code = M.code,
            post_content = M.post;

        if( !code ) {
          $tip.html(msg).addClass('alert-warning').slideDown(animateTime);
          return false;
        }

        $tip.html(msg).addClass('alert-success').slideDown(animateTime);
        // 将发布的数据加入页面中
        $(post_content).prependTo($('.feed-wrap'));
        $postTextbox.val('');
        $('.media_post_holder').html('');
        // 将发送按钮重新 disable
        checkLength();

        setTimeout(function() {
          $tip.html('').slideUp(animateTime);
        }, 1500);
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  // 检查弹出框的长度是否在 0~140 之间
  function checkLength() {
    if(!$postTextbox.length) return false;
    
    if($postTextbox.val().trim() === '' || $postTextbox.val().length > 140) {
      $sendBtn.attr('disabled', true);
    } else {
      $sendBtn.removeAttr('disabled');
    }
  }

  // 增加图片框
  function addMedia( media_url ) {
    $media_post_holder = $('.media_post_holder');
    $tmp = '<li class="media_post_item"><img src="' + media_url + '" alt="" /><a class="opr" href="javascript:void(0);">x</a><div class="overlay"></div></li>';

    $($tmp).appendTo($media_post_holder);
  }

  // remove media 预览图
  $(document).on('click', '.opr', function(e) {
    $this = $(this);
    $img_url = $this.siblings('img').attr('src');
    $.ajax({
      url: 'manage/api/remove_media',
      method: 'post',
      data: {img_url: $img_url},
      success: function(res) {
        var M = res.data,
            msg = M.msg,
            code = M.code;
        if(!code) {
          alert('删除失败');
          return;
        }
        $this.parent('li.media_post_item').remove();
        // 从需要发送的 media 数组中移除删除图片的地址
        var _index = $media_url.indexOf($img_url);
        $media_url.splice($img_url, 1);
      }
    });
  });


  // 页面刷新或退出时弹出提示
  var quitTip = '尚未完成帖子，确定现在退出？';
  $(window).on('beforeunload', function(e) {
    if( $('.media_post_item').length || $('#post_textbox').val() ) {
      e = e || window.event;
      if (e) e.returnValue = quitTip; // 兼容 IE
      return quitTip;
    }
  });
});

});