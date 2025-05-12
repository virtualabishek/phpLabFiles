<?php

$filename = 'dummy.csv';

// Check if file exists
if (!file_exists($filename)) {
    die("CSV file not found.");
}

// Open the file
$file = fopen($filename, 'r');

// Read and parse the CSV file
echo "<table border='1' cellpadding='5' cellspacing='0'>";

// Read the header row
if (($header = fgetcsv($file)) !== false) {
    echo "<tr>";
    foreach ($header as $col) {
        echo "<th>" . htmlspecialchars($col) . "</th>";
    }
    echo "</tr>";
}

// Read the data rows   
while (($row = fgetcsv($file)) !== false) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

// Close the file
fclose($file);

?>
