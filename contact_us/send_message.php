<?php
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $message = $_POST['message'];

    // Sanitize input
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($message);

    // Email details
    $to = 'info@ezems.co.ke';  // Send the message to this email address
    $subject = 'New Contact Us Message';
    $body = "Name: $name<br>Email: $email<br><br>Message:<br>$message";

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ezems.developers@gmail.com';
        $mail->Password = 'glgu ktrc jcgf jety';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Send email to info@ezems.co.ke
        $mail->setFrom('info@ezems.co.ke', 'Ezems Health Tech');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();

        // Clear all recipients and attachments for the next email
        $mail->clearAddresses();
        $mail->clearAttachments();

        // Send auto-reply to the user
        $mail->addAddress($email);
        $mail->Subject = 'Thank You for Reaching Out!';
        $mail->Body = "
            <p>Dear $name,</p>
            <p>Thank you for reaching out to us! We appreciate the time you took to share your feedback and inquiries with Health Tech. Your input is valuable to us, and we are committed to providing you with the best possible experience.</p>
            <p>Our team is currently reviewing your message, and we will get back to you as soon as possible. If your inquiry is time-sensitive, rest assured that we are working diligently to address it promptly.</p>
            <p>In the meantime, feel free to explore our website for additional resources on our innovative healthcare solutions, including telemedicine platforms, health tracking apps, AI diagnostics, and patient management systems. If you have any urgent matters, please don't hesitate to contact us directly at (254) 101086123.</p>
            <p>Once again, thank you for choosing Health Tech. We look forward to assisting you and appreciate your continued support as we strive to improve healthcare accessibility for all.</p>
            <p>Best regards,</p>
            <p>Health Tech Team</p>
            <p>+254101086123</p>
            <p>24/7 Support</p>
        ";
        $mail->send();
        //   header('Location: ../index.html');

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Include the database connection file
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'Elon2508/*-');
    define('DB_NAME', 'healthtech');
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Insert message into the database
    $stmt = $con->prepare("INSERT INTO messages (name, email, mobileno, message, reply) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $mobileno, $message, $reply);
    $stmt->execute();
    $stmt->close();

    // Insert notification into the database
    $notification = "New message from $name";
    $stmt = $con->prepare("INSERT INTO notifications (notification) VALUES (?)");
    $stmt->bind_param("s", $notification);
    $stmt->execute();
    $stmt->close();

    $con->close();

    // Redirect to index.php after successful email sending and database insertion
    header('Location: ../index.html');
    exit;
}
?>
