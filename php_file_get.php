<?php
// 获取的目录下的文件实例

// 指定目录
$dir = "/data/dir";
// 先判断指定的路径是不是一个文件夹
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) != false) {
            // 文件名的全路径 包含文件名
            $filePath = $dir . $file;
            // 获取文件修改时间
            $fmt = filemtime($filePath);
            echo "<span style='color:#666'>(" . date("Y-m-d H:i:s", $fmt) . ")</span> " . $filePath . "<br/>";
        }
        closedir($dh);
    }
}