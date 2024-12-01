<?php
session_start();

// Simulate user login (In real-world, you'd check against a database)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For the sake of this example, assume correct credentials:
    if ($username == 'user' && $password == 'password') {
        // Store username and the current time in session
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time(); // Store the time of login
        $_SESSION['last_login_time'] = date("Y-m-d H:i:s"); // Store the formatted last login time
        header("Location: dashboard.php");
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login Page</h2>
    <form method="POST">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <?php
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>
</body>

</html>