<?php
/**
 * 缩放图片规则方法
 * 此文件是用来实现图片缩略的
 * 其实之前想法是放到 api 这个文件夹下, 同其他接口形成一类方法
 * 但是很坑爹的是,总是失败, 图片一直显示不出来,弄了好久也没解决这个问题
 * 文件明明都已经加载进来了,去就是不显示,搞不懂......
 */

// load php methods
require('manage/app/methods.php');

$com_url = $_GET['com_url'];
$filename = $_GET['filename'];
$size = $_GET['size'];
$type = $_GET['type'];
$mime = $_GET['mime'];
($mime === 'jpg') ? 'jpeg' : $mime; // 转换 jpg 为 jpeg 格式

// 得到宽高
$size_arr = explode('_', $size);
$width = $size_arr[1];
$height = $size_arr[2];
// 文件的路径
$file_path = str_replace($size.$type, '', $com_url);
// 如果文件不存在
if( !file_exists(DOMROOT.'/'.$file_path) ) {
    $json = null;
    header('Content-Type: application/json; charset=UTF-8');
    $json = array('data' => array(
        'msg' => '错误',
        'code' => 0,
        'path' => DOMROOT.'/'.$file_path
    ));
    echo json_encode($json);
    exit;
}

header("Content-type: image/".$mime);
img_url_handle::imagecropper($file_path, $width, $height);