<?php
/** 信息发布 **/

// load php methods
require('../app/methods.php');

$post = trim($_POST['post_content']);
$media_url = $_POST['media_url'];

session_start();
header('Content-Type: application/json; charset=UTF-8');

if(empty($post)) {
    $json = array('data' => array(
        'msg' => '并没有发送的内容',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}

check_auth_user();

$user_id = get_user_id($_SESSION['valid_user']);

$db = db_connect();
// 插入 post 数据
$post = addslashes(htmlspecialchars($post));
$query = 'INSERT INTO post VALUES ("'.$user_id.'", NULL, now(), "'.$post.'")';
$result = $db->query($query);
if(!$result) {
    $json = array('data' => array(
        'msg' => '发送失败',
        'code' => 0
    ));
    echo json_encode($json);
    exit;
}
$post_id = $db->insert_id;

// 插入 media 数据
if($media_url.length) {
    foreach ($media_url as $item) {
        // 去掉 url 剪裁参数
        $item = trim($item);
        $item = img_url_handle::remove_img_prams($item);
        $media_query = 'INSERT INTO post_img VALUES (NULL, "'.$post_id.'", "'.$item.'")';
        $media_result = $db->query($media_query);
    }
}

// 查询发布的信息
$post_query = 'SELECT user_id, post, post_date FROM post WHERE post_id = "'.$post_id.'"';
$post_result = $db->query($post_query);
$post_r = $post_result->fetch_assoc();

// 查询用户的信息
$user_query = 'SELECT * FROM user_info WHERE user_id = "'.$user_id.'"';
$user_result = $db->query($user_query);
$user_r = $user_result->fetch_assoc();

// 查询发布的图片
$s_media_query = 'SELECT * FROM post_img WHERE post_id = "'.$post_id.'"';
$s_media_result = $db->query($s_media_query);

// 拼接图片显示 html
for($i = 1; $media_row = $s_media_result->fetch_assoc(); ++$i) {
    $media_row['img_src'] = img_url_handle::remove_img_prams($media_row['img_src']); // 去掉图片 url 的剪裁参数
    $media_row['img_src'] = img_url_handle::add_img_prams($media_row['img_src'], '_160_160', false); // 处理图片缩略
    $media_html .= '
        <li class="ST-pic s-img">
          <img action-type="pic_to_bg" class="bg-cursor" src="'.$media_row['img_src'].'" />
        </li>';
}

// 发布后的信息以 html 形式返回
$html = '
<div class="card card-wrap" data-st="'.$post_id.'">
  <div class="avatar pull-left">
    <a href="/detail/'.$user_id.'"><img src="'.$user_r['avatar'].'" alt="'.$user_r['user_nickname'].'" title="'.$user_r['user_nickname'].'" width="3.125em" /></a>
  </div>
  <div class="ST-detail">
    <div class="ST-info">
      <a href="/detail/'.$user_id.'" class="ST-txt fz-14 fw-b" title="'.$user_r['user_nickname'].'">'.$user_r['user_nickname'].'</a>
    </div>
    <div class="ST-txt" data-type="ST-message">
      '.$post_r['post'].'
    </div>
    <div class="ST-media-box">
      <ul class="ST-media">
        '.$media_html.'
      </ul>
    </div>
    <div class="ST-expend-media-box"></div>
  </div>
  <div class="post-datetime">
    <span>'.$post_r['post_date'].'</span>
  </div>
  <div class="post-opration">
    <div class="dropdown">
      <a class="dropdown-btn" data-toggle="dropdown" href="javascript:void(0);">
        <i class="fa fa-chevron-down"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#edit" data-toggle="ST-modal" data-target="#popup" ST-type="edit">编辑</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item danger" href="#delete" data-toggle="ST-modal" data-target="#popup" ST-type="delete">删除</a>
      </div>
    </div>
  </div>
</div>
';

$json = array('data' => array(
    'msg' => '发送成功',
    'code' => 1,
    'post' => $html,
    'user_info' => array(
        'user_id' => $user_r['user_id'],
        'user_nickname' => $user_r['user_nickname'],
        'avatar' => $user_r['avatar'],
        'post_content' => $post_r['post'],
        'post_date' => $post_r['post_date']
    )
));

echo json_encode($json);

