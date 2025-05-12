<?php 
session_start();
if(isset($_SESSION['name']) && isset($_SESSION['email'])) {
    echo "Welcome c" . $_SESSION['name'];
}
else {
    echo "No Session Available.";
}
?>