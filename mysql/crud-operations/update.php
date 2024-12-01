<?php
// Database connection variables
$servername = "localhost";  // Your server name (usually localhost)
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "users";          // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// New password and username for the update
$new_password = "newpassword123";  // New password you want to set
$username_to_update = "john_doe";  // Username of the user whose password you want to update

// SQL query to update password based on username
$sql = "UPDATE users SET password = ? WHERE username = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param("ss", $new_password, $username_to_update);  // 'ss' means two strings

// Execute the query
if ($stmt->execute()) {
    echo "Password updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
