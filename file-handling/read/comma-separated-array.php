<?php
// Specify the path to your text file
$file = 'comma-separated-array.txt';

// Check if the file exists
if (file_exists($file)) {
    // Read the contents of the file
    $content = file_get_contents($file);

    // Split the content into an array based on commas and spaces
    $fruits = explode(', ', $content);

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
