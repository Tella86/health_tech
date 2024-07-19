<?php
require 'africastalking/src/AfricasTalking.php';
require 'africastalking/vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reply = $_POST['reply'];
    $mobile = $_POST['mobileno'];
    $id = $_POST['id'];

    $username = 'ezems';
    $apiKey = '39fafb4f99370b33f2ce8a89fb49de56c6db75d19219d49db45c0522931be77e';
    $AT = new AfricasTalking($username, $apiKey);

    // Get the SMS service
    $sms = $AT->sms();

    // Create the message
    $message = $reply;

    // Use the service
    try {
        $result = $sms->send([
            'to' => $mobile,
            'message' => $message
        ]);

        // Store the reply in the database
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', 'Elon2508/*-');
        define('DB_NAME', 'healthtech');
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }

        // Update the message with the reply
        $stmt = $con->prepare("UPDATE messages SET reply = ? WHERE id = ?");
        $stmt->bind_param("si", $reply, $id);
        $stmt->execute();
        $stmt->close();

        mysqli_close($con);

        echo "Message sent and reply stored successfully!";
        header('location: dashboard.php');
    } catch (Exception $e) {
        error_log("Error: " . $e->getMessage());
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>
