<?php
$serverAddress = "localhost";
$serverUn = "root";
$serverPWd = "imp2083";
$ServerDb = "exampleDB";

$conn = new mysqli($serverAddress, $serverUn, $serverPWd, $ServerDb);

if($conn->connect_error) {
    die ("Error found: ".$conn->connect_error);
}

?>