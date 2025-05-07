<?php 
try {
    $number = 0;
    if($number ===0) {
        throw new Exception("Number can't be divide by 0");
    }
    $result = 10 / $number;
    echo $result;
}
catch(Exception $e) {
    echo "error: ". $e->getMessage();
}
?>