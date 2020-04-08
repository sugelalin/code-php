<?php
// 文件下载实例

/*
 * 两种方法，推荐第二种
 * 因为第一种方法只能下载浏览器不能解析的文件，比如rar啊，脚本文件之类。如果文件是图片或者txt文档，就会直接在浏览器中打开
 * 而第二种方法是直接输出的文件流，不存在上述问题
 */

// 方法一
// <a href="http://domain.com/data/a.tar.gz">下载 </a>

// 方法二
$filepath = '/data/a.tar.gz';
$filename = '';
$file=fopen($filepath,"r");
// 处理header
header("Content-Type: application/octet-stream");
header("Accept-Ranges: bytes");
header("Accept-Length: ".filesize($filepath));
header("Content-Disposition: attachment; filename=$filename");
// 输出文件流-可以分片
echo fread($file,filesize($filepath));
fclose($file);