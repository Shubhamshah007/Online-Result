<?php
$host = "localhost"; // Database server host (usually "localhost")
$username = "root"; // Your database username
$password = "door"; // Your database password
$database = "registration_database"; // Your database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
