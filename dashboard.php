<?php
session_start();
include 'config.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch user info
$user_id = $_SESSION['user_id'];
$sql = "SELECT username, email, address FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard - My Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">My Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3">
          <span class="text-primary fw-semibold">👤 <?php echo htmlspecialchars($user['username']); ?></span>
        </li>
        <li class="nav-item">
          <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Dashboard Content -->
<section class="py-5">
  <div class="container">
    <div class="card shadow border-0 rounded-4 p-4">
      <h3 class="mb-4 text-center text-primary fw-bold">Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h3>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3">
            <h5 class="fw-semibold text-secondary">Email</h5>
            <p><?php echo htmlspecialchars($user['email']); ?></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3">
            <h5 class="fw-semibold text-secondary">Address</h5>
            <p><?php echo htmlspecialchars($user['address']); ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="index.php" class="btn btn-primary">← Back to Home</a>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
