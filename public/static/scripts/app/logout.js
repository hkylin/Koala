define(['jquery'], function($) {
  
  // 登出
  $(function() {
    // 登出
    $('#logout').on('click', function(e) {
      e.preventDefault();
      
      $.ajax({
        url: '/manage/api/logout',
        method: 'post',
        success: function(res) {
          var M = res.data,
              msg = M.msg,
              code = M.code;
          if(!code) {
            alert('退出失败！');
          } else {
            window.location.href = 'login';
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    });
  });

});