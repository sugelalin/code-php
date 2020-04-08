<?php
/*
 * 排列组合，用于生成二维数组，各数组之间的元素的排列组合数组的算法
 * example：(1=>（ 1=> Student10, 2=>Student20, 3=>Student30, 4=>Student40）)
 * 应用场景：分组、淘宝SKU 的属性聚合
 *
 * 题外知识点：
 *      淘宝：SKU（stock keeping unit）库存量单位 --红色的&长的袜子 库存是20
 *      京东：SPU（standard product unit）标准化产品单元 --2018新款休闲旅游鞋 5521黑/安踏白 42
 *
 * 引申出对应MySQL 表的设计
 */

$combinList = array(1 => array("Student10", "Student11"),
    2 => array("Student20", "Student21", "Student22"),
    3 => array("Student30"),
    4 => array("Student40", "Student41", "Student42", "Student43"));

$combinList_attr = array(1 => array("red", "yellow"),
    2 => array("long", "mid", "short"),
    3 => array("madeinchina"),
    4 => array("size10", "size20", "size30", "size40"));

function getCombinResult($combinList) {

    // 获取组合总数 = cont(a[0]) * count(a[1]) ...
    $combinCount = 1;
    foreach ($combinList as $attr) {
        $combinCount *= count($attr);
    }

    $result = [];
    // 遍历生成组合
    foreach ($combinList as $attrIndex => $attrList) {

        // 每个属性在组合中的重复次数
        $repeatTimes = $combinCount / count($attrList);

        // 对每个属性进行循环
        foreach ($attrList as $index => $attr) {

            for ($i = 1; $i <= $repeatTimes; $i++) {
                $groupIndex = $i + $index*$repeatTimes;
                $result[$groupIndex][$attrIndex] = $attr;
            }
        }
    }
    return $result;
}
print_r(getCombinResult($combinList));
