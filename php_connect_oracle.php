<?php
// 连接 Oracle实例

/*
 * 1、安装apache和php。
 * 2、安装Oracle 10g Instant Client(或其他版本)。
 * 3、在php.ini中打开extension=php_oci8扩展。
 * 4、将php/ext目录下的php_oci8.dll文件拷贝到system32目录下。
 * 5、编写测试脚本测试。
 */

$db_uname = 'root';
$db_password = '123456';
$db_dbname = 'eg.//192.168.1.133/orcl';

$conn = oci_connect($db_uname, $db_password, $db_dbname);
if (!$conn) {
    $e = oci_error();
    print htmlentities($e['message']);
    exit;
} else {
    echo "连接oracle成功！";
}