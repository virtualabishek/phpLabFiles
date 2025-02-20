<!-- What are casting operators? Differentiate for from foreach statement. Write PHP 
program to illustrate use of for and foreach.   -->

<?php 

$myFavNumbers = [2,3,7,10,555,0];

// using for
for ($i = 0; $i<=5; $i++) {
    echo ($myFavNumbers[$i]." ");
}

echo "<br>";

//using foeach
foreach($myFavNumbers as $val) {
    echo ($val. " ");
}

$subTeachers = [];
$subTeachers['WT'] = "Ramesh";
$subTeachers['IS'] = "Kul";
$subTeachers['CG'] = "Sandip";
echo "<br>";

// with index
foreach ($subTeachers as $key => $val) {
    echo ($key.": ".$val." <br>");
}

?>