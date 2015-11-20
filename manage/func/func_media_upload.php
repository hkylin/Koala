<?php
/** 媒体文件上传 **/

// load php methods
require('../app/methods.php');

$json = null;

session_start();
header('Content-Type: application/json; charset=UTF-8');

check_auth_user();

$user_id = get_user_id($_SESSION['valid_user']);

$file_name = 'media_file';
if(!empty($_FILES[$file_name]['name'])) {
    $media_addr = img_url_handle::media_upload($file_name);
    $media_addr = img_url_handle::add_img_prams($media_addr, '_100_100', false);
}

// 返回上传成功信息
$json = array('data' => array(
    'msg' => '上传成功',
    'code' => 1,
    'upload_url' => $media_addr
));
echo json_encode($json);