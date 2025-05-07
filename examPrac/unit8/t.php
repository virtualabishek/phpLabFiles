<?php
function customErrorHandler( $errno, $errstr, $errfile, $errline) {
    echo "Error [$errno]: $errstr in $errfile on line $errline<br>";
}

// Set custom error handler
set_error_handler("customErrorHandler");

// Trigger an error
echo $undefinedVariable; // Calls customErrorHandler
?>