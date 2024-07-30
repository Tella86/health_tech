<?php
require 'hms/admin/africastalking/src/AfricasTalking.php';
require 'hms/admin/africastalking/vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $phoneNumber = $_POST['phoneNumber'];
    $senderPhoneNumber = $_POST['senderPhoneNumber'];
    $customMessage = $_POST['emergencyMessage'];

    // Message to send to the recipient
    $recipientMessage = "Emergency! Location: https://maps.google.com/?q=$latitude,$longitude\n"
                      . "Sender: $senderPhoneNumber\n"
                      . "Message: $customMessage";
    
    // Auto-reply message to the sender
    $autoReplyMessage = "YOUR Emergency message for $customMessage Has Been Received Successfull. YOU WILL BE CONTACTED SHORTLY. 
    THANK YOU FOR CHOOSING EZEMS HEALTH TECH. Your health, our priority.
     Compassionate care, innovative solutions—because your well-being is the heart of our mission.";
    
    // AfricasTalking API credentials
    $username = 'ezems';
    $apiKey = '39fafb4f99370b33f2ce8a89fb49de56c6db75d19219d49db45c0522931be77e';
    
    // Initialize AfricasTalking
    $AT = new AfricasTalking($username, $apiKey);

    // Get the SMS service
    $sms = $AT->sms();

    // Send the emergency notification message
    try {
        $result = $sms->send([
            'to' => $phoneNumber,
            'message' => $recipientMessage
        ]);

        // Send the auto-reply message to the sender
        $resultAutoReply = $sms->send([
            'to' => $senderPhoneNumber,
            'message' => $autoReplyMessage
        ]);

        echo "Notification sent successfully!";
    } catch (Exception $e) {
        echo "Error sending notification: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
