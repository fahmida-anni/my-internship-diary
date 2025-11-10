<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Website Template</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<script src="js/script.js"></script>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#home">MyWebsite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Original Sections -->
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>

                <!-- Authentication Links -->
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           <?= htmlspecialchars($_SESSION['username']) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="auth/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


  <!-- Hero Section -->
  <section id="home" class="hero d-flex align-items-center text-center text-white">
    <div class="container" data-aos="fade-up">
      <h1 class="display-4 fw-bold">Welcome to My Modern Website</h1>
      <p class="lead mt-3">Built with HTML, CSS, JS & Bootstrap — easy to edit and reuse.</p>
      <a href="#about" class="btn btn-primary btn-lg mt-3">Get Started</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6" data-aos="fade-right">
          <img src="assets/images/sample.jpg" class="img-fluid rounded shadow" alt="About Image">
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <h2 class="fw-bold mb-3">About Us</h2>
          <p>We design beautiful, responsive, and beginner-friendly website templates to help you learn and create faster.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-5 bg-light">
    <div class="container text-center" data-aos="fade-up">
      <h2 class="fw-bold mb-4">Our Services</h2>
      <div class="row g-4">
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Web Design</h5>
              <p class="card-text">Clean, creative, and responsive designs for your website or project.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Development</h5>
              <p class="card-text">Front-end and back-end solutions with modern technologies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Support</h5>
              <p class="card-text">Continuous updates, maintenance, and support for your websites.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5">
    <div class="container" data-aos="fade-up">
      <h2 class="text-center fw-bold mb-4">Get in Touch</h2>
      <form id="contactForm" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
          <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Your Email" required>
        </div>
        <div class="mb-3">
          <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
        <div id="formMessage" class="mt-3 text-center"></div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center py-4 text-white">
    <p class="mb-0">&copy; 2025 MyWebsite. All Rights Reserved.</p>
  </footer>

  <!-- Include Modals -->
  <?php include 'auth/modals.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="js/script.js"></script>
  <script>AOS.init({ duration: 800, offset: 100 });</script>
</body>
</html>
