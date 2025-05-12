<?php 
session_start();
$_SESSION['name'] = "subash";
$_SESSION['email'] = "bayalkoti80@gmail.com";
echo "Session Started! <a href='session.php'>Dashboard</a>";

?>