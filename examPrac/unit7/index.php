<?php 

$cookieName = "username";
$cookieValue = "abishek";
$cookieExpires = time() + 1600; // 30 minutes after cookies clear
setcookie($cookieName, $cookieValue, $cookieExpires, "/");

if(isset($_COOKIE[$cookieName])) {
    echo "Welcome back, ". htmlspecialchars($_COOKIE[$cookieName]);
}
else {
    echo "Cookies not found!";
}

?>