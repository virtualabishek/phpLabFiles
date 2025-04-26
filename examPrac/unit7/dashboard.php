<?php 
session_start();
if(!isset($_SESSION['logged_in']) || 
    $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit;
    }
    else {
        echo "Welcome {$_SESSION['username']} . ";
        echo "<br>";
        echo "<a href='logout.php'>Logout</a>";
    }

?>