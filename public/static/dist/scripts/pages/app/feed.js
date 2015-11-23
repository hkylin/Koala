define(['jquery', 'bootstrap'], function($, bootstrap) {

$(function() {
  ST_modal();
  function ST_modal() {
    $(document).on('click', 'a[data-toggle="ST-modal"], button[data-toggle="ST-modal"]', function(e) {
      e.preventDefault();
      e.stopPropagation();
      var $t = $(this),
          _type = $t.attr('ST-type');

      switch (_type) {
        case 'edit':
          edit_post($t);
          break;
        case 'delete':
          delete_post($t);
          break;
        case 'changepsd':
          cahnge_psd($t);
          break;
      }
    });
  }


  function edit_post(that) {
    var $t = $(that),
        $card = $t.parents('.card'),
        _postID = $card.data('st'),
        _target = $t.data('target'),
        $msgBox = $card.find('[data-type="ST-message"]'),
        _content = $msgBox.html().trim(),
        $ST_Modal = $(_target),
        $popupLabel = $ST_Modal.find('#popupLabel'), // 标题
        $modalBody = $ST_Modal.find('.modal-body'), // 内容
        $modalFooter = $ST_Modal.find('.modal-footer'); // 按钮

    $edit_html = '\
      <div class="alert alert-info" role="alert">请输入你要更改的内容</div>\
      <form>\
        <div class="form-group">\
          <textarea class="form-control" rows="4" id="post-message">' + _content + '</textarea>\
        </div>\
      </form>\
    ';
    $footer_html = '\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>\
      <button type="button" class="btn btn-primary" id="save">保存</button>\
    ';

    $popupLabel.html('编辑');
    $modalBody.html($edit_html);
    $modalFooter.html($footer_html);

    $ST_Modal.modal();

    $('#save').on('click', function(e) {
      e.preventDefault();
      var newMsg = $('#post-message').val();
      // 更新数据
      update_post(_postID, newMsg, $ST_Modal, $msgBox);
    });
  }


  function update_post(postId, newMsg, Modal, msgBox) {
    var url = '/manage/api/update_post',
        data = {post_id: postId, msg: newMsg};

    $.ajax({
      url: url,
      data: data,
      method: 'POST',
      success: function(res) {
        var M = res.data,
            code = M.code,
            msg = M.msg;

        if(Modal.length) {
          if(!code) {
            Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-warning').html(msg);
            return false;
          }
          
          Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-success').html(msg);
          // 更新这条数据
          msgBox.html(newMsg);
          // 关闭 modal
          setTimeout(function() {
            Modal.modal('hide'); 
          }, 120);
        } else {
        }

      },
      error: function(e) {
        console.log(e);
      }
    });
  }


  function delete_post(that) {
    var $t = $(that),
        $card = $t.parents('.card'),
        _postID = $card.data('st'),
        _target = $t.data('target'),
        $msgBox = $card.find('[data-type="ST-message"]'),
        _content = $msgBox.html().trim(),
        $ST_Modal = $(_target),
        $popupLabel = $ST_Modal.find('#popupLabel'), // 标题
        $modalBody = $ST_Modal.find('.modal-body'), // 内容
        $modalFooter = $ST_Modal.find('.modal-footer'); // 按钮

    $edit_html = '<div class="alert alert-danger" role="alert">确定要删除这条信息吗？</div>';

    $footer_html = '\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>\
      <button type="button" class="btn btn-danger" id="delete">删除</button>\
    ';

    $popupLabel.html('删除这条信息');
    $modalBody.html($edit_html);
    $modalFooter.html($footer_html);

    $ST_Modal.modal();

    $('#delete').on('click', function(e) {
      e.preventDefault();
      // 更新数据
      delete_msg(_postID, $ST_Modal, $card);
    });
  }


  function delete_msg(post_id, Modal, card) {
    var url = '/manage/api/delete_post';

    $.ajax({
      url: url,
      data: {post_id: post_id},
      method: 'POST',
      success: function(res) {
        var M = res.data,
            code = M.code,
            msg = M.msg;

        if(Modal.length) {
          if(!code) {
            Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-warning').html(msg);
            return false;
          }
          
          Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-success').html(msg);
          // 更新这条数据
          card.slideUp(150, function() { card.remove(); });
          // 关闭 modal
          setTimeout(function() {
            Modal.modal('hide'); 
          }, 120);
        } else {
        }
      },
      error: function(e) {
        console.log(e);
      }
    })
  }


  // 修改密码
  function cahnge_psd(that) {
    var $t = $(that),
        _target = $t.data('target'),
        $ST_Modal = $(_target),
        $popupLabel = $ST_Modal.find('#popupLabel'), // 标题
        $modalBody = $ST_Modal.find('.modal-body'), // 内容
        $modalFooter = $ST_Modal.find('.modal-footer'); // 按钮

    $edit_html = '\
      <div class="alert alert-info" role="alert">请输入你的密码及需要更新后的密码</div>\
      <form>\
        <div class="form-group">\
          <fieldset class="form-group">\
            <label for="oldPassword">旧密码</label>\
            <input type="password" class="form-control" id="oldPassword" placeholder="旧密码">\
          </fieldset>\
          <fieldset class="form-group">\
            <label for="newPassword">新密码</label>\
            <input type="password" class="form-control" id="newPassword" placeholder="新密码">\
          </fieldset>\
          <fieldset class="form-group">\
            <label for="newpassword1">确认密码</label>\
            <input type="password" class="form-control" id="newPassword1" placeholder="确认密码">\
          </fieldset>\
        </div>\
      </form>\
    ';

    $footer_html = '\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>\
      <button type="button" class="btn btn-primary" id="confirm">确认</button>\
    ';

    $popupLabel.html('修改密码');
    $modalBody.html($edit_html);
    $modalFooter.html($footer_html);

    $ST_Modal.modal();

    $('#confirm').on('click', function(e) {
      e.preventDefault();
      var oldpsd = $('#oldPassword').val(),
          newpsd = $('#newPassword').val(),
          newpsd1 = $('#newPassword1').val();

      change_psd(oldpsd, newpsd, newpsd1, $ST_Modal);
    });
  }


  function change_psd( oldpsd, newpsd, newpsd1, Modal ) {
    if( newpsd !== newpsd1 || newpsd.length < 6 || newpsd.length > 16 ) {
      Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-warning').html('两次密码输入要一致，且密码长度为 6-16 个字符');
      return false;
    }
    var url = '/manage/api/change_psd',
        data = {oldpsd: oldpsd, newpsd: newpsd, newpsd1: newpsd1};

    $.ajax({
      url: url,
      data: data,
      method: 'POST',
      success: function(res) {
        var M = res.data,
            code = M.code,
            msg = M.msg;

        if(Modal.length) {
          if(!code) {
            Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-warning').html(msg);
            return false;
          }
          
          Modal.find('.alert').removeClass('alert-info alert-success alert-warning alert-danger').addClass('alert-success').html(msg);
          // 关闭 modal
          setTimeout(function() {
            Modal.modal('hide'); 
          }, 800);
        } else {
        }

      },
      error: function(e) {
        console.log(e);
      }
    });
  }

});

});