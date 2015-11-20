<?php
require('app.php');

check_auth_user();

$user_id = get_user_id($_SESSION['valid_user']);

$query = 'SELECT * FROM user_info WHERE user_id = "'.$user_id.'"';
$result = get_data($query);

if( $result->num_rows > 0 ) {
    $r = $result->fetch_assoc();
    $user_info = array(
        'u_name' => $r['user_name'],
        'u_nickname'=> $r['user_nickname'],
        'u_avatar'=> $r['avatar'],
        'u_gender'=> $r['gender'],
        'u_mydesc'=> $r['mydesc']
    );
}

$smarty->assign('user_info', $user_info);

$smarty->display('profile.tpl');