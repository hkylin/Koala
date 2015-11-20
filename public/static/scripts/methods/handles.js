/**
 * 前端工具处理方法
 */
define(['jquery'], function($) {

var handles = {

  remove_img_prams: function ( src ) {
    var pattern = /((_[0-9]+){2})(_(g|t|b|c|))?.(jpg|jpeg|gif|png|JPG|PNG|GIF|JPEG)/,
        params_arr = pattern.exec(src),
        src_params = params_arr[1];
    src = src.replace(src_params, '');

    return src;
  }
  
};

return handles;
  
});
