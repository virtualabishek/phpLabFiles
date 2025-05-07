<?php
// Enable error logging (can also be set in php.ini)
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

// Trigger an error
$number = 0;
if ($number === 0) {
    error_log("Custom log: Division by zero attempted.");
    echo "Check the error log.";
}

// Simulate an error
echo $undefinedVariable;
?>