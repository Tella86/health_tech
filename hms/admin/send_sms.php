<?php
require 'africastalking/src/AfricasTalking.php';
require 'africastalking/vendor/autoload.php';


use AfricasTalking\SDK\AfricasTalking;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reply = $_POST['reply'];
    $mobile = $_POST['mobileno'];

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
        echo "Message sent successfully!";
    } catch (Exception $e) {
        error_log("Error: " . $e->getMessage());
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>
