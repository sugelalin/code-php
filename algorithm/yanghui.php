<?php

/*
 * 用PHP几年伟大的数学家-杨辉
 */
function printYangHui($num) {
    $arr = [];
    for ($i = 0; $i <= $num; $i++) {
        for ($j = 0; $j <=$i; $j++) {
            if ($j == 0 || $i == $j)
                $arr[$i][$j] = 1;
            else
                $arr[$i][$j] = $arr[$i-1][$j] + $arr[$i-1][$j-1];

            echo $arr[$i][$j] . "\t";
        }
        echo "\n";
    }
}

printYangHui(10);