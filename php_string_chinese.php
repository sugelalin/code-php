<?php
//  判断字符串中的中文

// 一、判断全是中文
$str = "'324是";
if (!eregi("[^\x80-\xff]", "$str")) {
    echo "全是中文";
} else {
    echo "不是";
}

// 二、判断含有中文
$str = "中文";
if (preg_match("/[\x7f-\xff]/", $str)) {
    echo "含有中文";
} else {
    echo "没有中文";
}
// 后者
$pattern = '/[^\x00-\x80]/';
if (preg_match($pattern, $str)) {
    echo "含有中文";
} else {
    echo "没有中文";
}