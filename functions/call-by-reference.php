<?php
// Function that accepts an array of numbers by reference and doubles each number
function doubleValue(&$numbers)
{
    // Loop through the array and double each number
    foreach ($numbers as &$number) {
        $number *= 2;  // Double the value of the current element
    }

    // Display the modified array inside the function
    echo "Modified array inside the function: ";
    print_r($numbers); // This will show the modified array
}

// Original array
$originalArray = [1, 2, 3, 4, 5];

// Display the original array before the function call
echo "Original array before the function call: ";
print_r($originalArray); // This will show the original array

// Call the function by passing the array by reference
doubleValue($originalArray);

// Display the original array after the function call
echo "Original array after the function call: ";
print_r($originalArray); // This will show the original array, which should be modified now
