<?php 
    // echo "Session";
    session_start();
?>

<html>
    <head>
        <title>Session</title>
        <style>
            * {
                background-color: black;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php 
        $_SESSION['theme'] = "dark";
        $_SESSION['color'] = "red";
        // $name = $_GET['name'];
        ?>
        <p>Hello World</p>
        <?php
        
        echo "Your theme is: ".$_SESSION['theme'];
        echo "<br>";
        echo "<pre>";
            print_r($_SESSION);
        echo "</pre>";
        // arr = [1,2,3,4];
        // console.log(arr[0]);
        session_unset(); //remove session
        print_r($_SESSION);
        session_destroy();
        print_r($_SESSION);
        ?>
    </body>
</html>