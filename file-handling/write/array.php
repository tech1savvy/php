<?php
// Define the array
$array = ["apple", "banana", "cherry", "grape"];

// Specify the file path
$file = 'fruits.txt';

// Open the file for writing (creates the file if it doesn't exist)
$file_handle = fopen($file, 'w');  // Use 'w' to overwrite or 'a' to append

// Check if the file was opened successfully
if ($file_handle) {
    // Write each array element to the file, one per line
    foreach ($array as $item) {
        fwrite($file_handle, $item . PHP_EOL);
    }

    // Close the file
    fclose($file_handle);

    // Confirmation message
    echo "Array has been written to the file.";
} else {
    echo "Unable to open the file.";
}
