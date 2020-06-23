<?php
    function checkArr($arr, $number){
        if ($number < 0 || $number >100)
            throw new Exception($number." is not in array!");
        else {
            for ($i = 0; $i < count($arr); $i++){
                if ($number == $arr[$i]) echo "<br/>".$number." in position: ".$i;
            }
        }
        
    } 
    $arr = [];
    for ($i = 0; $i <= 100; $i++){
        array_push($arr, rand(0,100));
    }
    try{
        // checkArr($arr,-1);
        // echo "<br/>";
        // checkArr($arr,-3);
        // echo "<br/>";
        echo checkArr($arr,3);
    } catch (Exception $e){
        echo $e->getMessage();
        echo "<br/>";
        echo $e->getLine();
        echo "<br/>";
        echo $e->getFile();
    } 