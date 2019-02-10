<?php


$arr = [4, 7, 1, 3, 2, 6];


var_export(mergeSort($arr));


function mergeSort(array $arr) {
    $count = count($arr);
    if ($count <= 1) {
        return $arr;
    }

    $left  = array_slice($arr, 0, (int)($count/2));
    $right = array_slice($arr, (int)($count/2));

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge(array $left, array $right) {
    $resultArr = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] > $right[0]) {
            array_push($resultArr, array_shift($left));
        } else {
            array_push($resultArr, array_shift($right));
        }
    }

    array_splice($resultArr, count($resultArr), 0, $left);
    array_splice($resultArr, count($resultArr), 0, $right);

    return $resultArr;
}