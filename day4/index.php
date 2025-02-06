<?php

$serverAddress = "localhost";
$dbUser = "root";
$dbPassword = "imp2083";
$dbName = "exampleDB";


$createConnection = new mysqli($serverAddress, $dbUser, $dbPassword, $dbName);


if ($createConnection->connect_error) {
    die("Error while connecting to the database: " . $createConnection->connect_error);
} else {
    echo "Connected successfully<br>";
}

$sql = "INSERT INTO userInfo VALUES
    (5, 'Hari', 'Thapa', 'Ktm', '9823241383', 'hari@12345')";


 $insert = $createConnection->query($sql);
if($insert) {
    echo("Inserted.");
}
else {
    echo("Cannot Insert.");
}
?>
