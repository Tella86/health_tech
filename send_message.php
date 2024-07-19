<?php
$servername = "localhost";
$username = "root";
$password = "Elon2508/*-";
$dbname = "healthtech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'];
$message = $input['message'];

$sql = "INSERT INTO messages_chat (username, message) VALUES ('$username', '$message')";

$response = array();
if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $conn->error;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
