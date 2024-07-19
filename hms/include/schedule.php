<?php
$servername = "localhost";
$username = "root";
$password = "Elon2508/*-";
$dbname = "healthtech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$link = $_POST['link'];

$sql = "INSERT INTO meetings (title, start, end, link) VALUES ('$title', '$start', '$end', '$link')";

if ($conn->query($sql) === TRUE) {
    echo "New meeting scheduled successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
