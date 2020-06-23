<?php
    function countChar($str, $x){
        $count = 0;
        $arr = str_split($str);
        for ($i = 0; $i < count($arr); $i++){
            if ($arr[$i] == $x){
                $count++;
            }
        }
        echo "Số lần xuất hiện của ".$x." là: ".$count;
    }
    countChar("12232",2);