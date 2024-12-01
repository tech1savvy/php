<?php
// Database connection variables
$servername = "localhost";  // Your server name (usually localhost)
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "users";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select username and password
$sql = "SELECT username, password FROM users";  // Replace 'users' with your table name
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"] . " - Password: " . $row["password"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
