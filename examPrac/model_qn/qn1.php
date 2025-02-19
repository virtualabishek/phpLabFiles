<?php 

/*Question: What is a function? How can you define and call a function in PHP? Write a PHP program to implement a function with 
parameters and a return value. [4+6] 

Answer: 
Function is a named block of code that peroforms sepecific task, possibly acting upon a set of values passing to it, known as 
parameters and possibly returning a single values or a set of arrays. Function saved the compile time, no matter how much time
you called the function, functions are compiled only once in the page. 


To define a function i will used the following syntax.

function function_name (parameters1, parameters2, parametersn) {
    operation1;
    operations2;
    operations3
    operationsn;
    return somthing
}
    // This is just a example. Function can also return a value or do something.

    To call a function we should call it by a function name and pass the parameters if there is any.


$answer = function_name($param1, $param2, $paramn)
*/

// Program

function sum($a, $b) {
    return $a + $b;
}

$answer = sum(2,4);
echo $answer;


?>