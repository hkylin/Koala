<?php
/**
 * 连接数据库
 * @return mysqli
 * @throws Exception
 */
function db_connect() {
    $result = new mysqli('localhost', 'secret', 'secret', 'secret');

    // 转换格式正确读取中文
    $result->query("SET NAMES UTF8");

    if(!$result) {
        throw new Exception('暂时不能连接数据库');
        exit;
    }
    return $result;
}