<?php
/** 信息发布 **/

// load php methods
require('../app/methods.php');

$json = null;
$post_id = $_POST['post_id'];

session_start();
header("Content-Type: application/json; charset=UTF-8");

if(empty($post_id)) {
    $json = array('data' => array(
        'msg' => '删除失败了,请稍后重试',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}


$delete_query = 'DELETE FROM post WHERE post_id = "'.$post_id.'"';
$delete_result = get_data($delete_query);

$json = array('data' => array(
    'msg' => '删除成功',
    'code' => 1
));
echo json_encode($json);