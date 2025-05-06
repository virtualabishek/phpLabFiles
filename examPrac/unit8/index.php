<!-- Just file checking -->
<?php
$file = "README.mdx";
if(file_exists($file)) {
    $content = file_get_contents($file);
    echo $content;
}
else {
    echo "Error: Sorry. ${file} doesnt found on given path.";
}
?>