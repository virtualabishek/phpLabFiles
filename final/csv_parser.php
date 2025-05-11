<?php 

$fileOpen = fopen("dummy.csv", "r");
if($fileOpen !== false) {
    while(($data = fgetcsv($fileOpen, 1000, ",")) !== false){
        $array[] = $data;
    fclose();
    }
}
else {
    echo "Error opening file.";
}

echo "<pre>";
echo var_dump($array);
echo "</pre>";


?>