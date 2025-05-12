<?php 
$open = "sample.csv";
if(!file_exists($open)) {
    die ("File not found!");
}

$use = fopen($open, "r");

echo "<table border = '1' cellpadding='5' cellspacing = '0'>";
if(($header = fgetcsv($use))!==false) {
    echo "<tr>";
    foreach($header as $col) {
    echo "<th>". htmlspecialchars($col) . "</th>";
    }
    echo "</tr>";
}

while(($rows = fgetcsv($use)) !== false) {
    echo "<tr>";
    foreach($rows as $r){
        echo "<td>".htmlspecialchars($r)."</td>";
    }
    echo "</tr>";
}

echo "<table>";
fclose($use);
?>