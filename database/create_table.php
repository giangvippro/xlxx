<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_menu";


// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE featured_video (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
photo VARCHAR(30) NOT NULL,
title VARCHAR(255) NOT NULL,
category VARCHAR(50)

)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();