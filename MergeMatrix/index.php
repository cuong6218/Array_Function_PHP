<?php
    $arr1 = [0,2,4];
    $arr2 = [3,5,6,7];

    // $arr3 = array_merge($arr1, $arr2);
    for ($i = 0; $i < count($arr1); $i++){
        $arr3[$i] = $arr1[$i];  
    }
    
    for ($j = 0; $j < count($arr2); $j++){
        $arr3[count($arr1)+$j] = $arr2[$j];
    }
    print_r ($arr3);
    
    