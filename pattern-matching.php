<?php
// 1. Pattern Matching with Regular Expressions

// preg_match() - Perform a regular expression match
$string = "Hello, world!";
$pattern = "/world/";
if (preg_match($pattern, $string)) {
    echo "Pattern 'world' found!<br>";
} else {
    echo "Pattern 'world' not found.<br>";
}

// preg_match_all() - Perform a global regular expression match
$pattern = "/Hello/";
preg_match_all($pattern, $string, $matches);
echo "Matches found: ";
print_r($matches);  // Output: Array ( [0] => Array ( [0] => Hello ) )

// preg_replace() - Replace all occurrences of a pattern with a replacement
$pattern = "/world/";
$replacement = "PHP";
echo "Replaced string: " . preg_replace($pattern, $replacement, $string) . "<br>";  // Output: Hello, PHP!

// preg_split() - Split a string by a regular expression
$string = "apple,banana,orange";
$fruits = preg_split("/,/", $string);
echo "Fruits array: ";
print_r($fruits);  // Output: Array ( [0] => apple [1] => banana [2] => orange )

// Case-insensitive matching
$pattern = "/hello/i";  // 'i' makes the pattern case-insensitive
if (preg_match($pattern, $string)) {
    echo "Pattern 'hello' found (case-insensitive)!<br>";
}

// 2. Regular Expressions Theory

// Basic Regular Expression Syntax:
// - `.` matches any character except newline
// - `*` matches 0 or more of the preceding character
// - `+` matches 1 or more of the preceding character
// - `^` matches the beginning of the string
// - `$` matches the end of the string
// - `[ ]` matches any one character in the brackets
// - `\d` matches any digit (0-9)
// - `\w` matches any word character (alphanumeric plus underscore)
// - `\s` matches any whitespace (space, tab, newline)

// Example: Validating an Email Address
$email = "test@example.com";
$pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
if (preg_match($pattern, $email)) {
    echo "Valid email address!<br>";
} else {
    echo "Invalid email address!<br>";
}

// Removing Non-Alphanumeric Characters Using preg_replace()
$string = "Hello!@# World$%^";
$pattern = "/[^a-zA-Z0-9]/";  // Match anything that's not alphanumeric
$replacement = "";
$sanitized_string = preg_replace($pattern, $replacement, $string);
echo "Sanitized string: " . $sanitized_string . "<br>";  // Output: HelloWorld
