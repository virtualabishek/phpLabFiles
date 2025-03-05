<?php 

try {
    if(!file_exists("text.txt")) {
        throw new Exception("File not found");
    }
}

catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}

?>