<?php 

$server = "localhost";
$user= "root";
$password = "imp2083";
$db = "phpLab";

$connect = new mysqli($server, $user, $password, $db);

if($connect->connect_error) {
    echo "Error while connecting the database.";
    die();
}


$SQLquery = "INSERT INTO studentInformation(name, password) VALUES ('Ram', 'ramdont@123')";

$connect->query($SQLquery);
?>