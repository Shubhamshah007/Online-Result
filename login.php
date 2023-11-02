<?php
// Establish a database connection (similar to your previous code)
$servername = "localhost";
$username = "root";
$password = "door";
$database = "registration_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = ["success" => false, "message" => "", "redirectUrl" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate input data here (e.g., check for empty fields)

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT password, rollno FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($storedPassword, $rollno);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $storedPassword)) {
            session_start(); // Start or resume a session
            // Set the session variable for the roll number
            $_SESSION['rollno'] = $rollno;
            $response["success"] = true;
            $response["message"] = "Login successful!";
            $response["redirectUrl"] = "result.php"; // Set the redirect URL for success
        } else {
            $response["message"] = "Invalid email or password. Please try again.";
        }
    } else {
        $response["message"] = "Invalid email or password. Please try again.";
    }

    $stmt->close();
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
