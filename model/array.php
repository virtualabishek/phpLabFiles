<!-- How conversion between array and variables is done?   -->

<?php 

$user = array("name"=>"Subash", "age"=>22, "dop"=>"gorkha");

extract($user);
echo $name;
echo $age;

$myName = "Abi";
$myAge = 21;
$myDOB = "Gkh";
// variable to array
// $myDetail = compact($myName, $myAge, $myDOB);
$myDetail = compact("myName", "myAge", "myDOB");
echo var_dump($myDetail);

?>