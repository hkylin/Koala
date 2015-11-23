// 缩放每条信息中的图片
define(['jquery', 'handles'], function($, Handles) {

$(function() {
  // 绑定事件
  $(document).on('click', '[action-type]', function(e) {
    e.preventDefault();
    $this = $(this);
    $action_type = $this.attr('action-type');
    
    switch ($action_type) {
      case 'pic_to_bg':
        zoomInPic($this);
        break;
      case 'pic_to_sm':
        zoomOutPic($this);
        break;
      case 'pic_to_new_win':
        openPicInNewWin($this);
        break;
      default:
        break;
    }

  });

  // 缩小图片
  function zoomOutPic($that) {
    var $this_card = $that.parents('.card-wrap'),
        $ST_expend_media_box = $this_card.find('.ST-expend-media-box'),
        $ST_expend_media = $ST_expend_media_box.find('.ST-expend-media'),
        $ST_media_box = $this_card.find('.ST-media-box');

    $ST_expend_media.remove();
    $ST_media_box.show();
  }


  // 放大图片
  function zoomInPic($that) {
    $loading_html = '<div class="loading"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>';

    var $ST_pic = $that.parent('.ST-pic'),
        this_src = $that.attr('src'),
        $this_card = $that.parents('.card-wrap'),
        $ST_expend_media_box = $this_card.find('.ST-expend-media-box'),
        $ST_media_box = $this_card.find('.ST-media-box'),
        $html = '';

    var img = new Image();
    img.src = Handles.remove_img_prams(this_src);

    // 加入 loading 动画
    $ST_pic.append($($loading_html));

    img.onload = function() {
      $html = '\
          <div class="ST-expend-media">\
            <div class="media-opr-tabs">\
              <div class="tab">\
                <ul class="clr">\
                  <li><a action-type="pic_to_sm" href="javascript:void(0)"><i class="fa fa-search-minus"></i>收起</a></li>\
                  <li><a action-type="pic_to_new_win" href="javascript:void(0)"><i class="fa fa-external-link"></i>查看大图</a></li>\
                </ul>\
              </div>\
            </div>\
            <div class="ST-media-view">\
              <div class="media-show-box sm-cursor">\
                <div class="artwork-box">\
                <img action-type="pic_to_sm" src="'+img.src+'" alt="" />\
                </div>\
              </div>\
              <!-- <div class="pic-select-box">\
                <div class="stage-box">\
                  <ul class="choose-box">\
                    <li>\
                      <a href="javascript:void(0);">\
                        <img src="/public/upload/21/media/8714a56e9831b4bfbfd991ed189b6162_160_160.jpeg" alt="">\
                      </a>\
                    </li>\
                  </ul>\
                </div>\
              </div> -->\
            </div>\
          </div>\
      ';

      $ST_media_box.hide();
      $ST_pic.find('.loading').remove();
      $ST_expend_media_box.html($html).show();

    }
  }

  // 在新窗口打开图片
  function openPicInNewWin($that) {
    var $media_opr_tabs = $that.parents('.media-opr-tabs'),
        $ST_expend_media_box = $media_opr_tabs.siblings('.ST-media-view'),
        this_src = $ST_expend_media_box.find('.artwork-box img').attr('src');

    var a = document.createElement('a');
    a.href = this_src;
    a.target = '_blank';
    document.body.appendChild(a);
    a.click();
    $(a).remove();
  }

});

});
