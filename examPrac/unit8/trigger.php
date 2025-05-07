<?php 

$age = 44;
if($age<18) {
    trigger_error("User should be more than 18.", E_USER_ERROR);
}

echo "You are valid.";

?>