<?php
// 1. Basic String Functions

// strlen() - Get the length of a string
$string = "Hello, world!";
echo "Length of string: " . strlen($string) . "<br>";  // Output: 13

// strtoupper() - Convert string to uppercase
echo "Uppercase: " . strtoupper($string) . "<br>";  // Output: HELLO, WORLD!

// strtolower() - Convert string to lowercase
echo "Lowercase: " . strtolower($string) . "<br>";  // Output: hello, world!

// substr() - Extract a substring
echo "Substring: " . substr($string, 7, 5) . "<br>";  // Output: world

// strpos() - Find the position of the first occurrence of a substring
$position = strpos($string, "world");
echo "Position of 'world': " . $position . "<br>";  // Output: 7

// str_replace() - Replace occurrences of a substring
$new_string = str_replace("world", "PHP", $string);
echo "Replaced string: " . $new_string . "<br>";  // Output: Hello, PHP!

// trim() - Remove whitespace from both ends of a string
$trimmed_string = "  Hello, world!  ";
echo "Trimmed string: '" . trim($trimmed_string) . "'<br>";  // Output: 'Hello, world!'
