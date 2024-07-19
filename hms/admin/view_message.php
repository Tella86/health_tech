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
    <style>
        .message-container {
            padding: 20px;
        }
        .reply-form {
            margin-top: 20px;
        }
        .reply-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .reply-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .reply-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php if ($message): ?>
            <h1>Message from <?php echo htmlspecialchars($message['name']); ?></h1>
            <p>Email: <?php echo htmlspecialchars($message['email']); ?></p>
            <p>Mobile No: <?php echo htmlspecialchars($message['mobileno']); ?></p>
            <p>Message: <?php echo htmlspecialchars($message['message']); ?></p>
            
            <div class="reply-form">
                <h2>Reply to this Message</h2>
                <form action="send_sms.php" method="post">
                    <textarea name="reply" rows="5" required placeholder="Type your reply here..."></textarea>
                    <input type="hidden" name="mobileno" value="<?php echo htmlspecialchars($message['mobileno']); ?>">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($message['id']); ?>">
                    <button type="submit">Send Reply</button>
                </form>
            </div>
        <?php else: ?>
            <p>No message found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
