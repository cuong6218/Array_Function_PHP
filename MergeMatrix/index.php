<?php
    $arr1 = [1,2,3];
    $arr2 = [4,5,6];
    $arr3 = [];
    // $arr3 = array_merge($arr1, $arr2);
    for ($i = 0; $i < 3; $i++){
        $arr3[$i] = $arr1[$i];   
    }
    
    for ($j = 3; $j < 6; $j++){
        $arr3[$j] = $arr2[$j-2];
    }
    print_r ($arr3);
    
    