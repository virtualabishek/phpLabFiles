<!-- Write a PHP program to parse a CSV file.   -->
<?php

$open = fopen("sample.csv", "r"); 

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