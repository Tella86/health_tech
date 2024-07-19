<?php
// database connection
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Elon2508/*-');
define('DB_NAME', 'healthtech');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Fetch unread notifications
$query = "SELECT id, notification, is_read FROM notifications WHERE is_read = 0";
$result = $con->query($query);

$notifications = array();
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

$con->close();
echo json_encode($notifications);

