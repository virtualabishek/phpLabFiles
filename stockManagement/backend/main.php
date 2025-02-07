<?php

$serverAddress = "localhost";
$dbUser = "root";
$dbPassword = "imp2083";
$dbName = "exampleDB";

$connectToDb = new mysqli($serverAddress, $dbName, $dbUser, $dbPassword);

if($connectToDb->connect_erorr) {
    die("Cannot connected to the database.".$connectToDb->connect_error);
}

else {
    echo("Connected to the database. <br>");
}

?>