<?php 
/* How can you retrieve form data? Write a PHP program to create a form data that 
will take a Fahrenheit value as input and displays equivalent Celsius value on 
submit. The Celsius = (5/9)*(Farenheit-32). */
 
// Program

?>

<html>
<head>
    <title>Fahrenheit to Celsius</title>    
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="fh">Enter Fahrenheit: </label>
    <input type="number" name="fh">
    <input type="submit">
</form>
<?php
$fh = $_POST['fh'];
if(!empty($fh)) {
    $celcius = ((5/9)*($fh-32));
    echo "The celcius is: ".$celcius;
}

?>
</body>
</html>
