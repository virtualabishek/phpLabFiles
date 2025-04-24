<?php
$conn = new mysqli("localhost", "root", "imp2083", "phpLab");

if($conn->connect_error) {
    echo "Error Found: " . $conn->connect_error;
}
else {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST['fname']) ? $_POST['fname']: "defaultName";
        $email = isset($_POST['mail']) ? $_POST['mail']: "email@gmail.com";
        $country = isset($_POST['country ']) ? $_POST['country ']: "defaultCountry";
       
        $stmt = $conn->prepare("INSERT INTO demoTable VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $name, $email, $country);
        $id = 1;
        
        if($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    else {
        echo "Please verify your server request Method";
    }
}
$conn->close();
?>