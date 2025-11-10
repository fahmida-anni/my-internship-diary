<?php
session_start();
include '../config.php';

if (!isset($_SESSION['verified']) || !isset($_SESSION['reset_email'])) {
    header("Location: ../index.php");
    exit;
}

$email = $_SESSION['reset_email'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        $message = "⚠️ Passwords do not match!";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $conn->query("UPDATE users SET password='$hashed', reset_code=NULL, reset_expires=NULL WHERE email='$email'");
        unset($_SESSION['reset_email'], $_SESSION['verified']);
        $message = "✅ Password reset successful! You can now <a href='../index.php' class='text-decoration-none'>login</a>.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password | My Website</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
</head>
<body style="background:#FFFBF3;">
<div class="auth-container" data-aos="fade-up">
    <h3 class="text-center mb-3">Reset Your Password</h3>
    <?php if($message): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="New Password" required>
        </div>
        <div class="mb-3">
            <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-success w-100 py-2">Reset Password</button>
    </form>
</div>
<script src="../js/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
