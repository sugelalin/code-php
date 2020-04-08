<?php
/*
 * 生成 从 字母A-到字母ZZ 的字母数组
 * [ A, B, C, ... AY, AZ, ...]
 *
 */

function getColumnRange($min, $max){
    $pointer = strtoupper($min);
    $out = array();
    $ret =1;
    while ($ret) {
        // string 转成 int min < point < max
        $a1 = str2Int($pointer);
        $b1 = str2Int(strtoupper($max));

        $ret = ($a1<=$b1)?1:0;
        if ($ret) {
            array_push($out, $pointer);
            $pointer++;
        }
    }
    echo json_encode($out);die;
}

function str2Int($str){
    $arr = array_reverse(str_split($str));
    $sum = 0;
    for ($i=0; $i < strlen($str); $i++) {
        $sum += (ord($arr[$i])-64)*pow(26, $i);
    }
    return $sum;
}
getColumnRange('A', 'Az');




