// db_connect.php

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hackathon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userid = isset($_POST["userid"]) ? $_POST["userid"] : "";

  $sql = "SELECT d.*
FROM doctor_patient dp
JOIN doctorinfo d ON dp.DoctorID = d.DoctorID
WHERE dp.userID = ?;";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>