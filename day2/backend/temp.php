<?php 

function Hello() {
    echo "Hello World";
}

Hello();


function printName($name) {
    echo "Your name is: $name";
}

echo("<br>");

printName("Abi");


function addNumber($num1, $num2) {
    return $num1 + $num2;
}

$sum = addNumber(2,3);
echo("<br/> $sum <br/>");

$numArray = array[1,2,3,4,5];
echo("$numArray");
function addNum(...$num){
    $sum = 0;
    $length = count($num);
    for($i=0; $i<$length; $i++) {
        $sum = $num + $num[$i];
    }
    return $sum;
}

$ans = addNum(2,3,4,5);
print($ans);

?>

