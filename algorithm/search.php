<?php
/*
 * 查找算法
 * 1、二分法查找算法
 */

// 二分法查找数组中的元素
function binarysearch($arr, $value, $start = 0, $end = NULL) {
    if($end == NULL)
        $end = count($arr) - 1;

    $index = floor(($start+$end)/2);
    $base = $arr[$index];

    if($value < $base)
        return binarysearch($arr, $value, $start, $index-1);
    else if($value > $base)
        return binarysearch($arr, $value, $index+1, $end);
    else return $index;
}