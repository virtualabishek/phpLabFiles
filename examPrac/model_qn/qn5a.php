<?php 
try {
    if(!fopen("file.txt", "r")) {
        throw new Exception("File not found");
    }
}
catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}


error_reporting(E_ALL);
ini_set('display_error', 1);
?>