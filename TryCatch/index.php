<?php
    function calc($x, $y){
        echo $x+$y."<br/>";
        echo $x-$y."<br/>";
        echo $x*$y."<br/>";
        echo $x/$y."<br/>";
        if (!$x || !$y) {
            throw new Exception('Division by zero.');
        }
        return 1/$x;
    }
    try{
        calc(5,5)."\n";
        calc(0,1)."\n";
        calc(1,0)."\n";
        calc(0,0)."\n";
    } catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }