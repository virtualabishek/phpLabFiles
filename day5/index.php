<?php
$user = "root";
$password = "imp2083";
$dbName = "exampleDB";
$host = 'localhost';



// Using PDO, just pass host and the dbname as a instance. This is also called DSN, Data Source Name.
// credientials are passed outside.
try {
    $pdo = new PDO ("mysql:host=$host;dbname=$dbName;charset=utf-8;", $user, $password);
    // for debugging and finding the error
    pdo->setAttribute(PDO:ATTR_ERRMODE, PDO:ERRMODE_EXCEPTION);
} catch (PDOException $e ) {
    die ("Connection Found".$e->getMessage());
}

?>