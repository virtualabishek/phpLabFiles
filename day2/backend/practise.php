<?php

function sumAllNumber(...$num) {
    $sum = 0;
    
    $length = count($num);
    for($i=0; i<=$length; $i++) {
        $sum = $sum + $num[$i];
    }
    return $sum;
}

$sum = sumAllNumber(2,3,4,5,2,4);
echo "$sum";


function printLoop() {
    for($i=0; i<=5; $i++) {
        echo "$i";
    }
}

printLoop();

?>