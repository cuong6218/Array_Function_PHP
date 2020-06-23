<?php
    function Sum($arr){
        $sum = 0;
        for ($i = 0; $i < count($arr); $i++){
            $sum += $arr[$i][$i];
        }
        echo $sum;
    }
    $arr = [
        [1,2,3],
        [4,5,6],
        [7,8,9],
        [7,8,9]
    ];
    Sum($arr);