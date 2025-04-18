<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //available
    $username =isset($_POST['uname']) ? $_POST['uname']: "";
    $email = isset($_POST['email']) ? $_POST['email']: "";
    $gender = isset($_POST['gender']) ? $_POST['gender']: "";


    if(!empty($username) && !empty($email)) {
        echo "Username: ".htmlspecialchars($username)."<br>";
        echo "Email: ".htmlspecialchars($email)."<br>";
        echo "Gender: ".htmlspecialchars($gender)."<br>";
    }
    else {
        echo "Required fields are mandatory to fill";
    }

}
else {
    echo "invalide request method";
}

?>