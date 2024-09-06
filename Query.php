<?php
// Database credentials
$servername = "localhost"; // Change if needed
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "hackathon"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from the doctor_patient table
$sql = "SELECT d.*
FROM doctor_patient dp
JOIN doctorinfo d ON dp.DoctorID = d.DoctorID
WHERE dp.userID = 6078922;";
echo "<h2>SQL Query:</h2>";
echo "<pre>" . htmlspecialchars($sql) . "</pre>";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data in an HTML table
    echo "<h2>Results:</h2>";
    echo "<table>";
    echo "<tr><th>DoctorID</th><th>PatientID</th></tr>";

    // Fetch and display each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['DoctorID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
	echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
	echo "<td>" . htmlspecialchars($row['Speciality']) . "</td>";
	echo "<td>" . htmlspecialchars($row['Qualification']) . "</td>";
	echo "<td>" . htmlspecialchars($row['Hospital']) . "</td>";
	echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
	echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

// Close connection
$conn->close();
?>