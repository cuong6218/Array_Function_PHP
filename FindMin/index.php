<?php
    function findMin($arr){
        // echo(min($arr));
        $min = $arr[0];
        for ($i = 0; $i < count($arr); $i++){
            if ($min > $arr[$i]){
                $min = $arr[$i];
            }
        }
        echo $min;
    }
    findMin([1,2,3,4,5,6]);
    findMin([1,2,3,4,5,0]);