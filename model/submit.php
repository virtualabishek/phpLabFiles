<?php 

if($_SERVER['REQUEST_METHOD'] == "GET" && !empty $_GET['fh']) {
    $value = $_GET['fh'];
    $ans = (5/9)*($value-32);
    echo "The ans is: ". $ans;
} else {
    echo "Request method failed.";
}

?>