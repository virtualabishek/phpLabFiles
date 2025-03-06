<?php 
/* 
What are variables? How can we define static variables? 
Write a PHP program to illustrate the use of the Switch statement.

A variable is a container for storing values like numbers, strings, floats, arrays, etc. 
A variable is declared using the `$` sign. There are some rules for defining variables:
1) A variable must start with a `$` sign.
2) A variable name must begin with a letter or an underscore (`_`).
3) A variable name cannot start with a number.
4) PHP variables are case-sensitive.

### **Defining Static Variable in PHP**
A static variable is a variable that retains its value between function calls. It is defined using the `static` keyword inside a function.
*/

function counter() {
    static $count = 0; // Static variable, retains value
    $count++;
    echo "Count: $count <br>";
}

// Calling function multiple times
counter(); // Output: Count: 1
counter(); // Output: Count: 2
counter(); // Output: Count: 3

// Example of Switch Statement
$day = "Monday";

switch ($day) {
    case 'Sunday':
        echo "It is Sunday";
        break;
    case 'Monday':
        echo "It is Monday";
        break;
    case 'Tuesday':
        echo "It is Tuesday";
        break;
    default:
        echo "Invalid day";
        break;
}
?>
