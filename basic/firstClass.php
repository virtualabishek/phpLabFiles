<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// define ("MESSAGE", "Hi This is defined. Should be uppercase.");
// echo MESSSAGE;

function callMe() {
    echo ("Hello! \n");
}

callMe();

// Passing Arguments to the function.


function addMe ($num1, $num2) 
{
    return $num1 + $num2;
}

$sum = addMe(1,2);

echo $sum;


//passing the defualt value.

function iamDefault($name = "Abi") {
    echo $name;
}

iamDefault();
echo("\n");
iamDefault("Peace");


// Array

echo ("Hi.<br>");
?>

