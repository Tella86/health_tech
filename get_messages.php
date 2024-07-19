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

$sql = "SELECT username, message, timestamp FROM messages_chat ORDER BY timestamp DESC";
$result = $conn->query($sql);

$messages = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(array_reverse($messages));
?>
