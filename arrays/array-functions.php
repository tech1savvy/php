<?php
// Sample string
$string = "apple, banana, cherry, grape, apple, banana";

// 1. Split string into an array
$fruits = explode(',', $string);
echo "<h3>Array after explode:</h3>";
print_r($fruits);

// 2. Trim whitespace from each element
$trimmed_fruits = array_map('trim', $fruits);
echo "<h3>Array after trim with array_map:</h3>";
print_r($trimmed_fruits);

// 3. Remove empty values
$fruits_with_empty = ["apple", "", "banana", " "];
$filtered_fruits = array_filter($fruits_with_empty, 'trim');
echo "<h3>Array after filtering empty values:</h3>";
print_r($filtered_fruits);

// 4. Find index of 'banana'
$search = "banana";
$index = array_search($search, $trimmed_fruits);
echo "<h3>Searching for '$search':</h3>";
echo $index !== false ? "Found '$search' at index $index" : "'$search' not found.";

// 5. Remove duplicates using array_unique
$unique_fruits = array_unique($trimmed_fruits);
echo "<h3>Array after removing duplicates with array_unique:</h3>";
print_r($unique_fruits);

// 6. Check if 'orange' exists in the array using in_array
$search_fruit = "orange";
if (!in_array($search_fruit, $unique_fruits)) {
    echo "<h3>'$search_fruit' is not in the array.</h3>";
} else {
    echo "<h3>'$search_fruit' is already in the array.</h3>";
}

// 7. Sort array in ascending order
sort($unique_fruits); // Sort the unique array
echo "<h3>Array after sorting in ascending order:</h3>";
print_r($unique_fruits);

// 8. Join array into a string
$imploded_fruits = implode(", ", $unique_fruits);
echo "<h3>Array after imploding into a string:</h3>";
echo $imploded_fruits;
