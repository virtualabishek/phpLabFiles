<?php
// For Loop

for ($i =0; $i<10; $i++) {
    echo $i;
    echo '<br>';
}
echo '<br>';


// echo ("<br>");

$fruit_name = array("Apple", "Mango", "Banana");

echo $fruit_name[0];
echo '<br>';


$vege_name = ['Brinjal', 'Potato'];
echo $vege_name[0];
echo '<br>';

print_r($vege_name);
echo '<br>';


// associative array.

$familydetails = array(
    "Mom" => "Bha",
    "Bro" => "Abii",

);

print_r($familydetails);

// Multidimension Array

$meals = array('breakfast'=>['egg', 'Chana' ],
            'launch' => ['rice, chesse']     
);

print_r($meals);

echo '<br>';

$tech = [['JS', 'HTML', 'CSS', 'React', 'NextJs', 'ViteJS'],
['NodeJS', 'Mern', 'Express', 'MongoDb']];

print_r($tech);

echo '<br>';

// looping through array
echo "Just Checking";
echo "<br>";
echo "hi";
echo "Is this automatically reloaded";
echo "abi";
echo "no";
?>