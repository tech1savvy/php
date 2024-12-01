<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Display</title>
</head>

<body>

    <h2>Enter Your Information</h2>

    <form action="" method="post">
        // when action attribute is empty, form is handled by php script below it
        <label for="user_input">Enter Text:</label><br>
        <input type="text" id="user_input" name="user_input" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted using the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the input value from the form
        $user_input = $_POST['user_input'];

        echo "<h3>You entered: " . htmlspecialchars($user_input) . "</h3>";
        // htmlspecialchars(): convert special characters in a string
    }
    ?>

</body>

</html>