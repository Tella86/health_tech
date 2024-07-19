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
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .chat-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .message-container {
            padding: 10px 0;
        }
        .message {
            background-color: #e5e5ea;
            padding: 10px 20px;
            border-radius: 20px;
            margin: 10px 0;
            max-width: 80%;
        }
        .message.outgoing {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }
        .message.incoming {
            background-color: #e5e5ea;
            align-self: flex-start;
        }
        .reply-form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .reply-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .reply-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        .reply-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <?php if ($message): ?>
            <div class="message-container">
                <div class="message incoming">
                    <strong>From: <?php echo htmlspecialchars($message['name']); ?></strong><br>
                    <p><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                </div>
            </div>
            
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
