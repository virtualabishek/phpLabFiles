<?php 
$host = "localhost";
$dbName = "phpLab";
$user = "root";
$pwd = "imp2083";


$connec = new mysqli($host, $dbName, $user, $pwd);


if($connec->connect_error) {
    echo("Error while connecting the database. <br>");
}

else {
    echo("Connected Succesfully. <br>").$connec->connect_error;
}
?>