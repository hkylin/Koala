<?php
/**
 * 检查用户是否登录
 * @return bool
 */
function check_auth_user() {
    if (!isset($_SESSION['valid_user'])) {
        $json = null;
        $json = array('data' => array(
            'msg' => '你没有登陆',
            'code' => 0
        ));
        echo json_encode($json);
        exit;
    }

    return true;
}

