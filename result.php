<?php
session_start(); // Start or resume a session

if (!isset($_SESSION['rollno'])) {
    // Redirect the user to the login page if they are not logged in
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$username = 'root';
$password = 'door';
$database = 'registration_database';

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_SESSION['rollno'])) { // Retrieve the roll number from the session
    $rollno = $_SESSION['rollno'];
    $query = "SELECT * FROM third_year WHERE rollno = $rollno";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentName = $row['name'];
        $WT = $row['WT'];
        $DBMS = $row['DBMS'];
        $CN = $row['CN'];
        $HCI = $row['HCI'];
        $TOC = $row['TOC'];
        $SGPA = $row['SGPA'];
    } else {
        $studentName = "Unknown";
        $WT = $DBMS = $CN = $HCI = $TOC = "N/A";
    }
} else {
    $studentName = "Roll No not provided.";
    $WT = $DBMS = $CN = $HCI = $TOC = "N/A";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" type="text/css" href="result_style.css">
</head>
<body>
    
  <div class="table-container">
  <table>
    <!-- Your HTML content here -->
  </table>
</div>
</body>
</html>
