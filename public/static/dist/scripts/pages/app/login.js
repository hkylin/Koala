define(['jquery', 'jquery.cookie', 'serializeObject'], function($, cookie, serializeObject) {

// 登陆
$(function() {
  animateTime = 300;
  $tip = $('#ST_tip');

  $form = $('#login_form');

  if($.cookie('U_email')) {
    $form.find('input[name="email"]').val($.cookie('U_email'));
  }

  var formCheck = {
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
    }
  };

  $form.on('blur', 'input[type="email"], input[type="password"]', function(e) {
    var $t = $(this);
    formCheck[$t.attr("name")](this);
  });

  $form.on('submit', function(e) {
    e.preventDefault();
    var url = '/manage/api/login',
        data = $form.serializeObject(),
        remember = $('#remember').is(':checked');

    data.remember = remember;

    $.ajax({
      url: url,
      data: data,
      method: 'POST',
      success: function(res, h) {
        var M = res.data,
            msg = M.msg,
            code = M.code;

        if(!code) {
          $tip.removeClass('alert-warning alert-success alert-danger alert-info');
          $tip
              .addClass('alert-warning')
              .html(msg)
              .slideDown(animateTime);
        } else {
          $tip.removeClass('alert-warning alert-success alert-danger alert-info');
          $tip
              .addClass('alert-success')
              .html(msg)
              .show();
          // 设置 cookie
          if(!!remember) {
            $.cookie('U_email', data.email, { expires: 7, path: '/' });
          } else {
            $.removeCookie('U_email');
          }
          // 跳转到登录页面
          window.location.href = '/';
        }
      },
      error: function(e) {
        $tip.removeClass('alert-warning alert-success alert-danger alert-info');
        $tip
            .addClass('alert-warning')
            .html('出错了，请重试')
            .slideDown(animateTime);
        console.log(e);
      }
    });
  });

});

});