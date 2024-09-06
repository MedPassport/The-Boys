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
  $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$DoB = isset($_POST["DoB"]) ? $_POST["DoB"] : "";
$Gender = isset($_POST["Gender"]) ? $_POST["Gender"] : "";
$father_name = isset($_POST["father_name"]) ? $_POST["father_name"] : "";
$mother_name = isset($_POST["mother_name"]) ? $_POST["mother_name"] : "";
$aadhar_num = isset($_POST["aadhar_num"]) ? $_POST["aadhar_num"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$blood_type = isset($_POST["blood_type"]) ? $_POST["blood_type"] : "";
$allergies = isset($_POST["allergies"]) ? $_POST["allergies"] : "";
$current_medications = isset($_POST["current_medications"]) ? $_POST["current_medications"] : "";
$major_disorders = isset($_POST["major_disorders"]) ? $_POST["major_disorders"] : "";

  $sql = "INSERT INTO form (first_name, last_name, DoB, Gender, father_name, mother_name, aadhar_num, email, blood_type, allergies, current_medications, major_disorders)
  VALUES ('$first_name', '$last_name', '$DoB', '$Gender', '$father_name', '$mother_name', '$aadhar_num', '$email', '$blood_type', '$allergies', '$current_medications', '$major_disorders')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>