<?php

$fileName = "README.md";

if(file_exists($fileName)) {
    $content = file_get_contents($fileName);
    echo "File Content: ". "\n".  $content . "\n";
}
else {
    echo "File Cannot Found.";
}

// Above is by string, now by array:
if(file_exists($fileName)) {
    $lines = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        echo "$line\n";
    }
}
else {
    echo "File Cannot Found.";
}
?>