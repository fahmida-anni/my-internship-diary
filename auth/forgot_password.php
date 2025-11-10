<?php
session_start();
include '../config.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    
    // Check if email exists
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows == 0) {
        $message = "⚠️ Email not found!";
    } else {
        // Generate 6-digit code
        $code = rand(100000, 999999);
        $expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));

        // Save code and expiry to DB
        $conn->query("UPDATE users SET reset_code='$code', reset_expires='$expiry' WHERE email='$email'");

        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com'; // your Gmail
            $mail->Password = 'YOUR_APP_PASSWORD'; // Gmail App password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('your_email@gmail.com', 'MyWebsite');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Verification Code';
            $mail->Body = "Hello!<br>Your verification code is: <b>$code</b><br>It will expire in 10 minutes.";

            echo "Code: $code";
            $_SESSION['reset_email'] = $email;
            header("Location: verify_code.php?sent=1");
            exit;
        } catch (Exception $e) {
            $message = "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<link href="../css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#FFFBF3;">
<div class="auth-container" data-aos="fade-up">
    <h3 class="text-center mb-3">Forgot Password</h3>
    <?php if($message): ?>
        <div class="alert alert-warning text-center"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter your registered email" required>
        </div>
        <button type="submit" class="btn btn-warning w-100 py-2">Send Reset Code</button>
        <div class="text-center mt-3">
            <a href="../index.php" class="small text-muted">Back to Home</a>
        </div>
    </form>
</div>
<script src="../js/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
