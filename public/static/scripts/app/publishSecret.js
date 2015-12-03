define(['jquery'], function($) {

// 发布信息
$(function() {
  var $publishForm = $('#publish_form'),
      $postTextbox = $publishForm.find('.post-textbox'),
      $psBox = $publishForm.find('.ps-box'),
      $postBtn = $('#post_btn'),
      $mediaBtn = $('a[action-type="pic-upload"]'),
      $mediaUploadForm = $('#media_upload_form'),
      $postImgInp = $mediaUploadForm.find('input[type="file"]'),
      $media_url = [], // 储存上传媒体文件的 url
      $tip = $('#ST_tip'),
      $num = $publishForm.find('.num'),
      animateTime = 300,
      timer = null;

  // 计算字数
  // 定义一个计时器，用来计算即使按键一直被按住也会计算字数的情况
  // 而不是等到按键松开才能看到字数的变化
  checkLength( false );
  $postTextbox.on('keyup', function(e) {
    clearInterval(timer);
    checkLength();
  });
  $postTextbox.on('keydown', function(e) {
    timer = setInterval(function(){
      checkLength();
    }, 10);
  });

  $postTextbox.on('focus', function(e) {
    checkLength();
  });
  $postTextbox.on('blur', function(e) {
    checkLength( false );
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

    if(file_data !== undefined) {
      form_data.append('media_file', file_data);
    } else {
      // 防止 input[type='file'] 的值为空的情况下
      // 会向后端发送错误数据
      return false;
    }

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
          $tip.html(msg).addClass('alert-warning').slideDown(animateTime, function() {
            setTimeout(function() {
              $tip.slideUp(animateTime);
            }, 1000);
          });
          return false;
        }
        addMedia(media_url);
        $media_url.push(media_url);
      },
      error: function(e) {
        $tip.html('图片上传失败了~').addClass('alert-warning').slideDown(animateTime, function() {
            setTimeout(function() {
              $tip.slideUp(animateTime);
            }, 1000);
          });
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

        // 发送成功后清空发送的媒体内容
        $media_url = [];
        
        if( !code ) {
          $tip.html(msg).addClass('alert-warning').slideDown(animateTime);
          return false;
        }

        $psBox.fadeIn(animateTime, function() {
          setTimeout(function() {
            $psBox.fadeOut(animateTime);
          }, 500);
        });

        // 将发布的数据加入页面中
        $(post_content).prependTo($('.feed-wrap')).hide().slideDown(animateTime);
        $postTextbox.val('');
        $('.post-media-holder').html('');
        // 将发送按钮重新 disable
        checkLength( false );

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
  function checkLength( isStart ) {
    if(!$postTextbox.length) return false;

    var value = $postTextbox.val().trim(),
        len = value.length,
        left_num = 140 - len;
    
    if(isStart === undefined || len) {
      if( left_num >= 0 ) {
        html = '还可输入<span class="fw-b">' + left_num + '</span>个字';
        $num.html( html ); 
      } else {
        html = ' 超出<span class="fw-b" style="color: #FF5105">' + Math.abs(left_num) + '</span>个字';
        $num.html(html);
      }
    } else {
      $num.html(''); 
    }
    
    if(value === '' || len > 140) {
      $postBtn.attr('disabled', true);
    } else {
      $postBtn.removeAttr('disabled');
    }
  }

  // 增加图片框
  function addMedia( media_url ) {
    $postMediaHolder = $('.post-media-holder');
    $tmp = '<li class="post-media-item"><img src="' + media_url + '" alt="" /><a class="close" href="javascript:void(0);"><i class="fa fa-times"></i></a><div class="overlay"></div></li>';

    $($tmp).appendTo($postMediaHolder);
  }

  // remove media 预览图
  $(document).on('click', '.post-media-item a.close', function(e) {
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
        $this.parent('li.post-media-item').remove();
        // 从需要发送的 media 数组中移除删除图片的地址
        var _index = $media_url.indexOf($img_url);
        $media_url.splice($img_url, 1);
      }
    });
  });


  // 页面刷新或退出时弹出提示
  var quitTip = '尚未完成帖子，确定现在退出？';
  $(window).on('beforeunload', function(e) {
    if( $('.post-media-item').length || $('#post_textbox').val() ) {
      e = e || window.event;
      if (e) e.returnValue = quitTip; // 兼容 IE
      return quitTip;
    }
  });
});

});