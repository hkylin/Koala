<?php
/**
 * 得到用户 user_id
 * @param $session_usr [$_SESSION['vaild_user']]
 * @return mixed
 * @throws Exception
 */
function get_user_id( $session_usr ) {
    $user = $session_usr;
    $db = db_connect();
    $query = 'SELECT user_id FROM register WHERE email = "'.$user.'"';
    $result = $db->query($query);

    if(!$result) {
        $json = array('data' => array(
            'msg' => '数据库出错',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }

    if(!$result->num_rows) {
        $json = array('data' => array(
            'msg' => '你没有注册',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }

    $r = $result->fetch_assoc();
    return $r['user_id'];
}


/**
 * 从数据库中得到数据
 * @param $query_condition [数据库查询条件]
 * @return bool|mysqli_result
 * @throws Exception
 */
function get_data( $query_condition ) {
    $db = db_connect();
    $query = $query_condition;
    $result = $db->query($query);

    if(!$result) {
        $json = array('data' => array(
            'msg' => '数据库查询错误',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }

    return $result;
}


/**
 * 得到发送的 post 数据
 * @param string $type [要得到数据的类型]
 *  'all' -- 全部 post
 *  'user' -- 按照用户 user_id
 *  'search' -- 按照搜索关键字
 * @param string $query_str [搜索关键字 或者 用户 id]
 * @return array
 */
function get_post( $type = 'all', $query_str = '' ) {
    $my_user_id = get_user_id($_SESSION['valid_user']);

    $query = '';
    switch ($type) {
        case 'all':
            $query = 'SELECT * FROM post ORDER BY post_date DESC';
            break;
        case 'user':
            $query = 'SELECT * FROM post WHERE user_id = "'.$query_str.'" ORDER BY post_date DESC';
            break;
        case 'search':
            $query = 'SELECT * FROM post WHERE post like "%'.$query_str.'%" ORDER BY post_date DESC';
            break;
        default:
            $query = 'SELECT * FROM post ORDER BY post_date DESC';
            break;
    };


    $result = get_data($query);

    $post = array();

    for($count = 1; $row = $result->fetch_assoc(); ++$count) {

        // 用户信息
        $user_id = $row['user_id'];
        $query = 'SELECT * FROM user_info WHERE user_id = "'.$user_id.'"';
        $user_result = get_data($query);
        $row['user_info'] = $user_result->fetch_assoc();

        // 用户图片数据
        $post_id = $row['post_id'];

        $media_query = 'SELECT * FROM post_img WHERE post_id = "'.$post_id.'"';
        $media_result = get_data($media_query);

        // 声明一个数组用来存放媒体文件路径
        $media = array();
        for($i = 1; $media_row = $media_result->fetch_assoc(); ++$i) {
            $media_row['img_src'] = img_url_handle::remove_img_prams($media_row['img_src']);
            $media[$i] = img_url_handle::add_img_prams($media_row['img_src'], '_160_160', false);
        }

        $row['media'] = $media;

        // 是否是 user 自己的 post
        $row['isMe'] = ($my_user_id === $user_id)? true : false;

        $post[$count] = $row;
    }

    return $post;
}



function get_user_info( $userid ) {
    $query = 'SELECT * FROM user_info WHERE user_id = "'.$userid.'"';
    $result = get_data($query);

    return $result->fetch_assoc();
}

