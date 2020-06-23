<?php
    function sumCol($arr, $col){
        $sum = 0;
        for ($i = 0; $i < count($arr); $i++){
            $sum += $arr[$i][$col];
        }
        echo $sum;
    }
    $arr = [
        [1,2,3],
        [1,2,3],
        [1,2,3],
        [1,2,3]
    ];
    $col = 0;
    sumCol($arr, $col);