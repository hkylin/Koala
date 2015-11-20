<?php
/** 信息发布 **/

// load php methods
require('../app/methods.php');

$json = null;
$post_id = $_POST['post_id'];
$update_msg = $_POST['msg'];

session_start();
header("Content-Type: application/json; charset=UTF-8");

if(empty($post_id)) {
    $json = array('data' => array(
        'msg' => '修改失败了,请稍后重试',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

if(empty($update_msg)) {
    $json = array('data' => array(
        'msg' => '修改内容不能为空',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}


$update_query = 'UPDATE post SET post = "'.$update_msg.'" WHERE post_id = "'.$post_id.'"';
$update_result = get_data($update_query);

$json = array('data' => array(
    'msg' => '修改成功',
    'code' => 1
));
echo json_encode($json);