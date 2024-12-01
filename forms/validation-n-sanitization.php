<?php
// Initialize variables to store form data and errors
$email = $password = $confirm_password = $security_answer = "";
$emailErr = $passwordErr = $confirmPasswordErr = $securityAnswerErr = "";

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitize_input($_POST["email"]);
        // Check if the email is in a valid format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = sanitize_input($_POST["password"]);
        // Check if the password meets the required conditions
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            $passwordErr = "Password must include at least one uppercase letter.";
        } elseif (!preg_match("/[a-z]/", $password)) {
            $passwordErr = "Password must include at least one lowercase letter.";
        } elseif (!preg_match("/\d/", $password)) {
            $passwordErr = "Password must include at least one digit.";
        } elseif (!preg_match("/[\W_]/", $password)) {
            $passwordErr = "Password must include at least one special character.";
        } else {
            // Validate Confirm Password
            if (empty($_POST["confirm_password"])) {
                $confirmPasswordErr = "Confirm password is required";
            } else {
                $confirm_password = sanitize_input($_POST["confirm_password"]);
                // Check if the password and confirm password match
                if ($confirm_password !== $password) {
                    $confirmPasswordErr = "Passwords do not match.";
                }
            }
        }
    }

    // Validate Security Question Answer
    if (empty($_POST["security_answer"])) {
        $securityAnswerErr = "Security answer is required";
    } else {
        $security_answer = sanitize_input($_POST["security_answer"]);
    }

    // If no errors, simulate a successful submission (this is just a placeholder for demonstration)
    if (empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr) && empty($securityAnswerErr)) {
        // This is where you would process the form, like checking with the database
        echo "<h3>Form submitted successfully!</h3>";
    }
}

// Function to sanitize user input
function sanitize_input($data)
{
    $data = trim($data); // Remove unnecessary whitespace
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
</head>

<body>

    <h2>Signup Form</h2>

    <form action="" method="post">
        <!-- Email Field -->
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" required><br>
        <span style="color: red;"><?php echo $emailErr; ?></span><br><br>

        <!-- Password Field -->
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <span style="color: red;"><?php echo $passwordErr; ?></span><br><br>

        <!-- Confirm Password Field -->
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <span style="color: red;"><?php echo $confirmPasswordErr; ?></span><br><br>

        <!-- Security Question Field -->
        <label for="security_answer">Security Question: What is your mother's maiden name?</label><br>
        <input type="text" id="security_answer" name="security_answer" required><br>
        <span style="color: red;"><?php echo $securityAnswerErr; ?></span><br><br>

        <!-- Submit Button -->
        <input type="submit" value="Submit">
    </form>

</body>

</html>