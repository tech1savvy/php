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

// Username of the user to delete
$username_to_delete = "john_doe";  // Example: username of the user to delete

// SQL query to delete user by username
$sql = "DELETE FROM users WHERE username = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind the parameter (username) to the prepared statement
$stmt->bind_param("s", $username_to_delete);  // 's' means string

// Execute the query
if ($stmt->execute()) {
    echo "User deleted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
