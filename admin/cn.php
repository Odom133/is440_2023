<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IS440_2023";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$home='http://localhost/IS440_2023/admin';


?>