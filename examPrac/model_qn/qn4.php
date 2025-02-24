<!-- Write a PHP program to parse a CSV file.   -->
<?php

// Printing as a array!

$open = fopen("sample.csv", "r"); 

// 1000 is the maximum number of characters to read from the line
// "," is the delimiter, indicating that the CSV file is comma-separated.
if ($open !== false) { 
    while (($data = fgetcsv($open, 1000, ",")) !== false) { 
        $array[] = $data;
    }
    fclose($open);
} else {
    echo "Error opening file."; 
}

echo "<pre>";
var_dump($array);
echo "</pre>";


?>