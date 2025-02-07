<?php

$user = 'root';
$password = 'imp2083';
$db = "exampleDB";
$host = 'localhost';

$connection = new mysqli($host, $user, $password, $db);

if($connection->connect_error) {
    echo("Error while connecting the database. <br>").$connection->connect_error;
    die();
}
else {
    echo ("Connected succesfully. <br>");
}

$sqlInsertQuery = 'INSERT INTO userInfo VALUES (7, "User", "Thapa", "Hetauda", 9862712313, "pass@123")';

$resultFromTheInsert = $connection->query($sqlInsertQuery);


if($resultFromTheInsert) {
    echo("Inserted Successfully. <br>");
}
else {
    echo("Cannot Insert The Data. <br>");
}
?>