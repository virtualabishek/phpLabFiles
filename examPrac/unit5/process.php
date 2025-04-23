<?php

$conn = new mysqli("localhost", "root", "imp2083", "phpLab");

if($conn->connect_error) {
    echo "Error Found" + $conn->connect_error;
}

else {

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST['fname']) ? $_POST['fname']: "defaultName";
        $email = isset($_POST['email']) ? $_POST['email']: "email@gmail.com";
        $country = isset($_POST['country']) ? $_POST['country']: "defaultCountry";
       
       $sql = "INSERT INTO demoTable (1, $name, $email, $country)";

       $result = $conn->query($sql);
       echo ($result);
       
       
       }
       
       else {
           echo "Please verify your server request Method";
       }

}

?>