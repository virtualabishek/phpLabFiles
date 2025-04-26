<?php 

$secretUser = "virtualabi";
$secretPwd = "imp2083";

if(!isset($_SERVER['PHP_AUTH_USER'])
    || $_SERVER['PHP_AUTH_USER'] !== $secretUser 
    || $_SERVER['PHP_AUTH_PWD'] !== $secretPwd) {
        //send auth
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header(('HTTP/1,0.41. Please enter validate credentials.'))
;        echo "Access Denied\!";
    }
    else {
        echo "Welcome to, {$_SERVER['PHP_AUTH_USER']}! You have access to the area.";
    }
?>