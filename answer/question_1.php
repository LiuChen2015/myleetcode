<?php
namespace Project\answer;


/**
 * 题号：1. 两数之和
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * 示例:
 *    给定 nums = [2, 7, 11, 15], target = 9
 *    因为 nums[0] + nums[1] = 2 + 7 = 9
 *   所以返回 [0, 1]
 * @param array $array
 * @param int $target
 * @return array
 */
function question_1(array $array, int $target): array
{
    $start_time = microtime(true);
    if (empty($array)) {
        return [
            'status' => -1,
            'msg' => '数组不能为空'
        ];
    }
    $array = array_unique($array);
    foreach ($array as $key => $value) {
        if ($value > $target) {
            unset($array[$key]);
        }
    }
    $result = [];
    foreach ($array as $key => $value) {
        foreach ($array as $k => $v) {
            if ($key == $k) {
                continue;
            }
            if ($value + $v == $target) {
                $result =  [$key, $k];
            }
        }
    }
    $end_time = microtime(true);
    return [
        'status' => 0,
        'result' => $result,
        'msg' => '执行时间为：' . round($end_time-$start_time, 6)*1000 . 'ms' . PHP_EOL
    ];
}
echo "<pre>";
$answer_1 = question_1([2, 7, 11, 15], 9);
var_dump($answer_1);