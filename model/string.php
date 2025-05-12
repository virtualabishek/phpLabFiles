<!-- Write a PHP program that will read two input strings in variables fname and 
lname and display concatenation of fname and lname.  -->

<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    
    $fullName = $first . " " .  $last;
    echo $fullName;
} else {
    echo "Request Method Failed.";
}
?>