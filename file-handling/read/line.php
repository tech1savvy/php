<?php
// Specify the path to your text file
$file = 'line.txt';

// Check if the file exists
if (file_exists($file)) {
    // Read the contents of the file line by line into an array
    $fruits = file($file, FILE_IGNORE_NEW_LINES);

    // Use foreach to display each item in the array
    echo '<ul>';
    foreach ($fruits as $fruit) {
        echo "<li>$fruit</li>";
    }
    echo '</ul>';
} else {
    // Display an error message if the file doesn't exist
    echo "The file $file does not exist.";
}
