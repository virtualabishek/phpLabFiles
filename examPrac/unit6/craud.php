<?php 

$server = "localhost";
$username = "root";
$password = "imp2083";
$db = "phpLab";

if($_SERVER['REQUEST_METHOD'] == "POST") {
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
        $studentId = 1;

        $stmt = $conn->prepare("INSERT INTO student (id, name, class, email) VALUES (?, ?, ?, ?) ");
        $stmt->bind_param("isss", $studentId, $studentName, $studentClass, $studentEmail);
        if($stmt->execute()) {
            echo "Inserted Successfully!";
        }
        else {
            echo "Cannot Insert";
        }
        $stmt->close();


        // 2. Updating the data.
        

    }




    $conn->close();
    

}

else {
    echo "Request Method Failed!";
}

?>