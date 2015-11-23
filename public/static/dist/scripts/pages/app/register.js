define(['jquery', 'jquery.cookie', 'serializeObject'], function($, cookie, serializeObject) {

// 注册
$(function() {

  var $tip = $('#ST_tip'),
      $form = $('#register_form'),
      animateTime = 300;

  var formCheck = {
    nickname: function(that) {
      var $t = $(that),
          _val = $t.val(),
          nicknameReg = /^[0-9a-zA-Z\u4e00-\u9fa5_-]{2,15}$/;
      // if(!nicknameReg.test(_val)) {
      //   $tip.html('有的字符可能无法显示').addClass('alert-warning').slideDown(animateTime);
      // }
    },
    email: function(that) {
      var $t = $(that),
          _val = $t.val(),
          emailReg = /^[0-9a-z_][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}\.){1,4}[a-z]{2,4}$/;
      if( !emailReg.test(_val) ) {
        $tip.html('请输入正确邮箱格式').addClass('alert-warning').slideDown(animateTime);
      } else {
        $tip.html('').slideUp(animateTime);
      }
    },
    password: function(that) {
      var $t = $(that),
          _val = $t.val(),
          _val_length = _val.length;
      if(!_val || _val_length < 6 || _val_length > 16) {
        $tip.html('密码由6-16位字符组成, 区分大小写').addClass('alert-warning').slideDown(animateTime);
      } else {
        $tip.html('').slideUp(animateTime);
      }
    },
    password1: function(that) {
      var $t = $(that),
          _val = $t.val(),
          _psdval = $form.find('input[name="password"]').val();
      if( _val !== _psdval ) {
        $tip.html('两次密码输入不一致').addClass('alert-warning').slideDown(animateTime);
      } else {
        $tip.html('').slideUp(animateTime);
      }
    }
  };

  if($form.find('input[name="password"]').val() !== $form.find('input[name="password1"]').val()) {
    $tip.html('两次密码输入不一致').addClass('alert-warning').slideDown(animateTime);
  }

  $form.on('blur', 'input[type="email"], input[type="password"], input[type="text"]', function(e) {
    var $t = $(this);
    formCheck[$t.attr("name")](this);
  });

  $form.on('submit', function(e) {
    e.preventDefault();
    var url = '/manage/api/register.php',
        data = $form.serializeObject();

    $.ajax({
      url: '/manage/api/register.php',
      method: 'POST',
      data: data,
      success: function(res) {
        var M = res.data,
            msg = M.msg,
            code = M.code;
         
        if(!code) {
          $tip.removeClass('alert-warning alert-success alert-danger alert-info');
          $tip
              .addClass('alert-warning')
              .html(msg)
              .show();
        } else {
          $tip.removeClass('alert-warning alert-success alert-danger alert-info');
          $tip
              .addClass('alert-success')
              .html(msg)
              .show();
          // 设置 cookie
          $.cookie('U_email', data.email, { expires: 7, path: '/' });
          // 跳转到登录页面
          window.location.href = 'login';
        }
      },
      error: function(e) {
        $tip.html('出错了，请重试').addClass('alert-warning').slideDown(animateTime);
        console.log(e);
      }
    });
  });
});

});