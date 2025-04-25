<?php 

$server = "localhost";
$username = "root";
$password = "imp2083";
$db = "phpLab";

if($_SERVER['REQUEST_METHOD'] == 'post') {
    // Connection to db;
    $conn = new mysqli($server, $username, $password, $db);
    if($conn->connect_error) {
        echo "Error Found: ". $conn->connect_error;
    }
    else {
        // Connected Successfully
        
        
        // 1.  For Inserting | Creating
        $studentName = $_POST['name'] ?? "defaultName";
        $studentClass = $_POST['class'] ?? "0";
        $studentEmail = $_POST['email'] ?? 'mail@gmail.com';
        

    }
    

}

else {
    echo "Request Method Failed!";
}

?>