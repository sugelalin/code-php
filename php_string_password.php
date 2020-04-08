<?php
// 生成随机密码实例

// 方法一：用随机数+ASCII码表生成随机数 33-126
function generate_password1($pw_length = 8)
{
    $randpwd = '';
    for ($i = 0; $i < $pw_length; $i++)
    {
        $randpwd .= chr(mt_rand(33, 126));
    }
    return $randpwd;
}

// 方法二：
function generate_password2($length = 8)
{
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);

        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $password;
}

// 方法三：
function generate_password3($length = 8)
{
    $salt = 'wangyl@gmail.com';
    return substr(md5(time().$salt), 0, $length);
}

// 调用该函数，传递长度参数
$pwd1 = generate_password1(6);
$pwd2 = generate_password2(6);
$pwd3 = generate_password3(6);


