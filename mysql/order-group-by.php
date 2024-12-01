<?php
// Step 1: Establish database connection
$servername = "localhost";
$username = "root";
$password = ""; // Use your actual database password here
$dbname = "company"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: SQL query to fetch employees from 'Sales' department with salary > $4000
// Sort results by salary in ascending order and group by department
$sql = "
    SELECT department, COUNT(id) AS total_employees, name, salary
    FROM staff
    WHERE department = 'Sales' AND salary > 4000
    GROUP BY department
    ORDER BY salary ASC
"; // ORDER BY salary DESC, will resut in descending order

// Step 3: Execute the query and check if successful
$result = $conn->query($sql);

// Step 4: Check if there are results and display them
if ($result->num_rows > 0) {
    // Output data for each row
    echo "<h2>Employees in Sales Department (Salary > 4000)</h2>";
    echo "<table border='1'>
            <tr>
                <th>Department</th>
                <th>Total Employees</th>
                <th>Employee Name</th>
                <th>Salary</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['department'] . "</td>
                <td>" . $row['total_employees'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['salary'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No employees found matching the criteria.";
}

// Step 5: Close the database connection
$conn->close();
