<?php


session_start();
$userName = "abi";
$userPWd = "check123";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'] ?? "";
    $pwd = $_POST['password'] ?? "";
    if($name === $userName && $pwd = $userPWd) {
        // stored the value of the data
        $_SESSION['username'] = $name;
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    }
    else {
        echo "Invalide. <a href='form.php'>Try Again</a>";
    }
}

else {
    echo "Request Method Failed!";
}

?>
