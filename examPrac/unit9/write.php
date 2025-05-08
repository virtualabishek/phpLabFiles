<?php
$fileName = "hello.txt";
// For Writing
$data = "Life is fun with PHP.";
if(file_exists($fileName)) {
    $handle = fopen($fileName, "w");
    if($handle) {
    if(fwrite($handle, $data)) {
        echo "Data writtem successfully.";
    }
    else {
        echo "Data cannot be written.";
    }
    } else {
        echo "File Cannot open.";
    }

} else {
    echo "File not exits.";
}
?>