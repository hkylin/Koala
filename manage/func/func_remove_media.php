<?php
/** 移除上传的图片文件 **/

// load php methods
require('../app/methods.php');

$json = null;
$img_url = $_POST['img_url'];

session_start();
header("Content-Type: application/json; charset=UTF-8");

check_auth_user();

if(is_array($img_url)) {
    echo 'array is not support for now.';
    exit;
} else {
    $img_url = img_url_handle::remove_img_prams($img_url);

    if(unlink($_SERVER['DOCUMENT_ROOT'] . $img_url)) {
        $json = array('data' => array(
            'msg' => '删除成功',
            'code' => 1
        ));
        echo json_encode($json);
    } else {
        $json = array('data' => array(
            'msg' => '删除失败',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }
}
