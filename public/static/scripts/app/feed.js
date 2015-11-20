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
      }
    });
  }


  function edit_post(that) {
    console.log($(that))
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
          }, 800);
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

    $popupLabel.html('删除');
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
          }, 800);
        } else {
        }
      },
      error: function(e) {
        console.log(e);
      }
    })
  }

});

});