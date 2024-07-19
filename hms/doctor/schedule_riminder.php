<?php
require '../admin/africastalking/src/AfricasTalking.php';
require '../admin/africastalking/vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

// Database connection parameters
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Elon2508/*-');
define('DB_NAME', 'healthtech');

// Set up AfricasTalking
$username = 'ezems';
$apiKey = '39fafb4f99370b33f2ce8a89fb49de56c6db75d19219d49db45c0522931be77e';
$AT = new AfricasTalking($username, $apiKey);
$sms = $AT->sms();

// Connect to the database
$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get patients with a visit date tomorrow
$query = "SELECT p.PatientContno, p.PatientName, m.NextVisitDate FROM tblpatient p
          JOIN tblmedicalhistory m ON p.ID = m.PatientID
          WHERE m.NextVisitDate = DATE_ADD(CURDATE(), INTERVAL 1 DAY)";
$result = $con->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mobile = $row['PatientContno'];
        $name = $row['PatientName'];
        $visitDate = $row['NextVisitDate'];

        $message = "Dear $name, this is a reminder that your next visit is scheduled for $visitDate. Please make sure to attend.";
        
        // Send SMS
        try {
            $sms->send([
                'to' => $mobile,
                'message' => $message
            ]);
            echo "Reminder sent to $name\n";
        } catch (Exception $e) {
            error_log("Error sending SMS to $name ($mobile): " . $e->getMessage());
        }
    }
} else {
    echo "No reminders to send today.";
}

$con->close();
?>
