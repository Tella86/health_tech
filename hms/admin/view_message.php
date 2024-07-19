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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the message
    $stmt = $con->prepare("SELECT * FROM messages WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = $result->fetch_assoc();
    $stmt->close();

    // Mark the notification as read
    $stmt = $con->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message</title>
</head>
<body>
    <?php if ($message): ?>
        <h1>Message from <?php echo htmlspecialchars($message['name']); ?></h1>
        <p>Email: <?php echo htmlspecialchars($message['email']); ?></p>
        <p>Mobile No: <?php echo htmlspecialchars($message['mobileno']); ?></p>
        <p>Message: <?php echo htmlspecialchars($message['message']); ?></p>
    <?php else: ?>
        <p>No message found.</p>
    <?php endif; ?>
</body>
</html>
