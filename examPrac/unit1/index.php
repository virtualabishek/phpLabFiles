<html>
    <body>
        <?php 
        if(!empty($_GET['name'])) {
            echo "Welcome ".$_GET['name'].", Hope you will enjoy PHP.";
            echo "<br>";
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" >
            <label name="name">Name:</label>
            <input type="text" name="name">
            <input type="submit" >
        </form>
    </body>
</html>