<?php
 $uploadDir = "/var/www/html/phpLab/examPrac/unit9/public/";
 $allowedTypes = ["image/jpeg", "image/png"];
 $maxSize = 2 * 1024 * 1024;

if(!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}


if($_SERVER['REQUEST_METHOD'] == "POST" &&
isset($_FILES['Userfile'])) {
$file = $_FILES['Userfile'];
// check errorra
if($file["error"] !== UPLOAD_ERR_OK) {
    echo "Error: Upload file Error code. {$file["error"]}";
    exit;
}
// validate
#babal
if(!in_array($file["type"], $allowedTypes)) {
    echo "Error: only jpeg and png are allowed.";
    exit;
}
if($file["size"] > $maxSize) {
    echo "File Size should be less than 2 MB.";
    exit;
}
 $fileName = uniqid() . "-"  . basename($file["name"]);
 $destination = $uploadDir . $fileName;

 if(move_uploaded_file($file["tmp_name"], $destination)) {
    echo "File uploaded successfully: <a href='$destination'>$fileName</a>";
} else {
    echo "Error: Failed to move uploaded file.";

}



} else {
    echo "Error: No file uploaded.";

}
 ?>