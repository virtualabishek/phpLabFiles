<?php 

$userName = "Abi";

echo $userName[1];

echo "<br>";

for ($i=0; $i < strlen($userName); $i++ ) {
    echo $userName[$i];
}

$myDetail = "   My name is Abishek  ";
echo "<br>";
echo htmlspecialchars("<h1>I love to code.</h1>");
echo "<br>";

echo "<br>";
$ans = strcmp("abi", "Abi");
echo $ans;
echo "<br>";
echo trim($myDetail);

echo "<br>";
$email = "abishek@abishekn.com.np";
$email1 = "abishekcom.np";
if (preg_match("/^[\w.-]+@[\w.-]+\.\w+$/", $email1)) {
    echo "Valid email";
}

else {
    echo "invalid email";
}

echo "<br>";
$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str);
echo "<br>";

// So confused to seee list on the array

$love = ["Mom", "Bro"];

list($mummy, $brother) = $love;

echo $mummy;

echo "<br>";

echo $brother;

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

?>