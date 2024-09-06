<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Database Records</h1>

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

// SQL query to select all data from the table
$sql = "SELECT * FROM doctor_patient";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data in an HTML table
    echo "<table>";
    echo "<tr><th>userid</th><th>first_name</th><th>last_name</th><th>DoB</th><th>Gender</th><th>father_name</th><th>mother_name</th><th>aadhar_num</th><th>email</th><th>blood_type</th><th>allergies</th><th>current_medications</th><th>major_disorders</th></tr>";

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
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</body>
</html>