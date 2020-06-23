<?php
function findMax($arr){

    $max = $arr[0][0];
    $x = 0;
    $y = 0;
    for ($i = 0; $i < count($arr); $i++){
        for ($j = 0; $j < count($arr[$i]); $j++){
            if ($max < $arr[$i][$j]){
                $max = $arr[$i][$j];
                $x = $i;
                $y = $j;
            }
        }
    }
    print_r ($arr);
    echo "<br/>Phần tử  lớn nhất ở vị trí [".$x."][".$y."] có giá trị là ".$max;
}

// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//     $width = $_POST['width'];
//     $height = $_POST['height'];
//     findMa
// }
$arr = [
    [1,2,3],
    [4,0,6],
    [7,8,3]
];
findMax($arr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <h1>Type Matrix m x n</h1>
<form method="post">
    <input type="text" name="width" placeholder="Type m"/>
    <input type="text" name="height" placeholder="Type n"/>
    <input type="submit" value="Find max"/>
</form>     -->
</body>
</html>
