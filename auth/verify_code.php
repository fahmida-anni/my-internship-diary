<?php
session_start();
include '../config.php';

if (!isset($_SESSION['reset_email'])) {
    header("Location: ../index.php");
    exit;
}

$email = $_SESSION['reset_email'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $code = $conn->real_escape_string($_POST['code']);

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND reset_code='$code'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (time() < strtotime($row['reset_expires'])) {
            $_SESSION['verified'] = true;
            header("Location: reset_password.php");
            exit;
        } else {
            $message = "❌ Code expired! Please request a new one.";
        }
    } else {
        $message = "⚠️ Invalid verification code!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verify Code | My Website</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
</head>
<body style="background:#FFFBF3;">
<div class="auth-container" data-aos="fade-up">
    <h3 class="text-center mb-3">Verify Your Code</h3>
    <?php if($message): ?>
        <div class="alert alert-danger text-center"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="code" maxlength="6" class="form-control text-center fs-4" placeholder="Enter 6-digit code" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Verify</button>
    </form>
    <div class="text-center mt-3">
        <a href="../index.php" class="small text-muted">Back to Home</a>
    </div>
</div>
<script src="../js/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/di
