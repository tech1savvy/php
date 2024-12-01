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

// Prepare your SQL query
$username_to_insert = "john_doe";  // Example username
$password_to_insert = "password123";  // Example password (plain text)

// SQL query to insert data
$sql = "INSERT INTO users (username, password) VALUES ('$username_to_insert', '$password_to_insert')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
