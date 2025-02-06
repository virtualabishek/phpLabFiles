<?php
echo "Just Checking. Is It Running";

echo "<br>";
$peace = array('today' => 'presence',
'zen' => 'Presence of mind', 'One Minute Sit' => 'One Minute Buddha',
'self' => 'self being');
print_r($peace);

echo "<br>";

foreach ($peace as $key => $value) {
    echo " You be ".$key." and you will become ".$value.". ";
}

echo "<br>";

echo (sizeof($peace));

// echo array_key_exists(self, $peace);

// To convert string from array use, implode.

echo "<br>";
$menu = implode(', ', $peace);
echo $menu;

echo "<br>";

$menus = explode(', ', $peace);
echo $menus;



?>