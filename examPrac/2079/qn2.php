<?php 
/* 

How can you store string type data in an array? Write a PHP program to illustrate use of extract
 and compact functions for conversion between arrays and variables.

We can stored data in different ways, some ways are: 



*/

$array1 = ["mom", "brother", "me"];
$relation = array('mother'=>'bhagawati', 'brother'=>'abinash', 'me'=>'abishek');
// I am not sure weather this is correct or not.


// extract.


// extract($relation);

echo $mother."\n";
echo $brother."\n";
echo $me."\n";

// compact ma chai doubt cha.

$love = "code";
$hate = 'use';
$balance = 'design';

$things = compact("love", "hate", "balance");
print_r($things);
?>