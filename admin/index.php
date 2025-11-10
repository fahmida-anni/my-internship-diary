<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - MyWebsite</title>
<link href="../css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container py-5 text-center">
  <h2 class="mb-4">Admin Dashboard</h2>
  <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
  <a href="users.php" class="btn btn-primary m-2">Manage Users</a>
  <a href="../auth/logout.php" class="btn btn-danger m-2">Logout</a>
</div>
</body>
</html>
