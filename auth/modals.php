<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="loginLabel">Login</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="auth/login.php" class="p-4">
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="text-center mt-3">
          <small>Don’t have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</a></small><br>
          <small><a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">Forgot Password?</a></small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- REGISTER MODAL -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="registerLabel">Register</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="auth/register.php" class="p-4">
        <div class="mb-3">
          <input type="text" name="username" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Register</button>
        <div class="text-center mt-3">
          <small>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- FORGOT PASSWORD MODAL -->
<div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-warning text-white rounded-top">
        <h5 class="modal-title" id="forgotLabel">Forgot Password</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="auth/forgot_password.php" class="p-4">
        <div class="mb-3">
          <label class="form-label fw-semibold">Enter your registered email</label>
          <input type="email" name="email" class="form-control form-control-lg" placeholder="you@example.com" required>
        </div>
        <button type="submit" class="btn btn-warning w-100 py-2">Send Reset Code</button>
        <div class="text-center mt-3">
          <small><a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Back to Login</a></small>
        </div>
      </form>
    </div>
  </div>
</div>



<?php
// login.php (simplified example for modal login)
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config.php';
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo 'success';
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'Email not found';
    }
}
?>
