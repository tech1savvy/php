<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Display</title>
</head>

<body>

    <h2>Enter Your Information</h2>

    <form action="" method="get">
        <!-- when action attribute is empty, form is handled by php script below it -->
        <label for="user_input">Enter Text:</label><br>
        <input type="text" id="user_input" name="user_input" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted using the GET method
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_input'])) {
        // why isset()
        /*
        `isset()` is used in the `GET` method to check 
        if the `user_input` parameter exists in the URL query string before accessing it, 
        preventing errors if the form has not been submitted and the parameter does not exist.
        */

        // Retrieve the input value from the URL query string
        $user_input = $_GET['user_input'];

        echo "<h3>You entered: " . htmlspecialchars($user_input) . "</h3>";
        // htmlspecialchars(): convert special characters in a string to HTML entities
    }
    ?>

</body>

</html>