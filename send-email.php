<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader or include PHPMailer manually if you downloaded it
require './vendor/autoload.php'; // Adjust path based on where Composer or PHPMailer is installed

header('Content-Type: application/json'); // Set header for JSON response

if (isset($_POST['email'], $_POST['name'], $_POST['subject'], $_POST['message'])) {
    $receiving_email_address = 'lookindharamshala@gmail.com';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lookindharamshala@gmail.com';  // Your Gmail address
        $mail->Password   = 'jftn immx obgp hsjv';          // App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress($receiving_email_address);        // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body    = nl2br(htmlspecialchars($_POST['message']));
        $mail->AltBody = strip_tags($_POST['message']);

        $mail->send();

        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
}
?>
