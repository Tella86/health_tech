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
                    <title>Dashboard</title>
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
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgb(0, 0, 0);
                        background-color: rgba(0, 0, 0, 0.4);
                        padding-top: 60px;
                    }

                    .modal-content {
                        background-color: #fefefe;
                        margin: 5% auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 80%;
                    }

                    .close {
                        color: #aaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                    }

                    .close:hover,
                    .close:focus {
                        color: black;
                        text-decoration: none;
                        cursor: pointer;
                    }
                    </style>
                </head>

                <body>
                    <div class="chat-container">
                        <button id="viewMessageBtn">View Message</button>
                    </div>

                    <div id="messageModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div class="message-container">
                                <?php if ($message): ?>
                                <div class="message incoming">
                                    <strong>From: <?php echo htmlspecialchars($message['name']); ?></strong><br>
                                    <p><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                                </div>
                                <?php else: ?>
                                <p>No message found.</p>
                                <?php endif; ?>
                            </div>

                            <?php if ($message): ?>
                            <div class="reply-form">
                                <h2>Reply to this Message</h2>
                                <form id="replyForm" action="send_sms.php" method="post">
                                    <textarea name="reply" rows="5" required
                                        placeholder="Type your reply here..."></textarea>
                                    <input type="hidden" name="mobileno"
                                        value="<?php echo htmlspecialchars($message['mobileno']); ?>">
                                    <input type="hidden" name="id"
                                        value="<?php echo htmlspecialchars($message['id']); ?>">
                                    <button type="submit">Send Reply</button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <script>
    var modal = document.getElementById("messageModal");
    var btn = document.getElementById("viewMessageBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    document.getElementById('replyForm').onsubmit = function(event) {
        event.preventDefault(); // prevent form submission

        // Disable the submit button and show loading message
        var submitButton = document.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.innerText = "Sending...";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "send_sms.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert("Reply sent successfully");
                    modal.style.display = "none";
                    window.location.href = "dashboard.php";
                } else {
                    alert("Error sending reply. Please try again.");
                    submitButton.disabled = false;
                    submitButton.innerText = "Send Reply";
                }
            }
        };
        xhr.send(new URLSearchParams(new FormData(this)).toString());
    };
</script>
