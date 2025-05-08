<?php
$fileName = "hello.txt";





// For Reading

if(file_exists($fileName)){
$handle = fopen($fileName, "r");
if($handle) {
    $content = fread($handle, filesize($fileName));
    echo $content;
    fclose($handle);
} else {
    echo "Error: File Cannot Open";
}
} else {
    echo "Error: File doesnt exist.";
}
?>