<?php
// Sample strings
$email = "test@example.com";
$phone = "9876543210";
$text = "Hello, my name is Abishek and I love coding!";

// Regular expressions
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // Email validation
$phonePattern = "/^[0-9]{10}$/"; // 10-digit phone validation
$wordPattern = "/\b\w+\b/"; // Extract words

// Check if email is valid
if (preg_match($emailPattern, $email)) {
    echo "Valid Email: $email <br>";
} else {
    echo "Invalid Email <br>";
}

// Check if phone number is valid
if (preg_match($phonePattern, $phone)) {
    echo "Valid Phone Number: $phone <br>";
} else {
    echo "Invalid Phone Number <br>";
}

// Extract words from text
preg_match_all($wordPattern, $text, $matches);
echo "Extracted Words: ";
print_r($matches[0]);
?>
