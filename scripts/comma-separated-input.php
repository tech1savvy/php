<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 
a) Create a PHP script that accepts a comma-separated list of product names from a form and stores them into an indexed array. 
Display the list of products in alphabetical order.
b) Write the sorted product names to a text file. If the file already exists, append the new list while ensuring there are no duplicate entries.
    -->
</head>

<body>
    <h2>Enter a Comma-Separated List</h2>

    <form action="" method="post">
        <label for="product_list">Products:</label><br>
        <input type="text" id="product_list" name="product_list" placeholder="Enter products, separated by commas" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Handle form submission if POST method is used
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and process the product list input
        $product_list = $_POST['product_list'];

        // Convert the comma-separated string into an array and remove extra spaces
        $products = array_map('trim', explode(',', $product_list));

        // Remove any duplicates in the products array
        $products = array_unique($products);

        // Sort the array alphabetically
        sort($products);

        // Output the sorted list of products
        echo "<h2>Sorted List of Products</h2>";
        echo "<ul>";
        foreach ($products as $product) {
            // Sanitize and output each product in a list item
            echo "<li>" . htmlspecialchars($product) . "</li>";
        }
        echo "</ul>";

        // Define the file path where the products will be stored
        $file_path = 'products.txt';

        // Check if file exists, if not, create it
        if (file_exists($file_path)) {

            // Read the existing products from the file
            $existing_products = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // Merge new products with existing products while removing duplicates
            $all_products = array_unique(array_merge($existing_products, $products));
        } else {
            // If the file doesn't exist, simply use the new products
            $all_products = $products;
        }

        // Open the file in append mode
        $file = fopen($file_path, 'a');  // Use 'a' mode to append

        // Append the new unique products to the file
        foreach ($all_products as $product) {

            // Only write to file if product is not already in the file
            if (!in_array($product, $existing_products)) {
                fwrite($file, $product . PHP_EOL);
            }
        }

        // Close the file
        fclose($file);
    }
    ?>

</body>

</html>