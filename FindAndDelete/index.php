<?php
    function FindDel($arr, $x){
        for ($i = 0; $i < count($arr); $i++){
            if ($arr[$i] == $x){
                array_splice($arr, $i, 1);
            }
        }
        print_r ($arr);
    }
    FindDel([1,2,3,4],2);
        // $a = 0;
        // for ($i = 0; $i < count($arr); $i++){
        //     if ($arr[$i] = $x){
        //         $a = $i;
        //         for ($j = $a; $j < count($arr); $j++){
        //             $arr[$j] = $arr[$j+1];
        //         }
        //     }
        // }
        
        // echo $a;
   
    