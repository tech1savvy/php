<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Check if the session has expired (10 minutes)
if (time() - $_SESSION['login_time'] > 600) { // 600 seconds = 10 minutes
    // Session expired, destroy session and redirect to login
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Display the user's username and the last login time
$username = $_SESSION['username'];
$lastLoginTime = $_SESSION['last_login_time'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Last login time: <?php echo htmlspecialchars($lastLoginTime); ?></p>
    <p>Your session will expire in 10 minutes of inactivity.</p>

    <a href="logout.php">Logout</a>
</body>

</html>