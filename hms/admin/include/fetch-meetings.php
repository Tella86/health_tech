<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "Elon2508/*-";
$dbname = "healthtech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, start, end, link FROM meetings";
$result = $conn->query($sql);

$events = array();

while ($row = $result->fetch_assoc()) {
    $e = array();
    $e['title'] = $row['title'];
    $e['start'] = $row['start'];
    $e['end'] = $row['end'];
    $e['link'] = $row['link'];
    $events[] = $e;
}

echo json_encode($events);

$conn->close();
?>
