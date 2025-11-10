<?php
session_start();
include '../config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
  $username=$conn->real_escape_string($_POST['username']);
  $email=$conn->real_escape_string($_POST['email']);
  $address=$conn->real_escape_string($_POST['address']);
  $password=$_POST['password'];
  $confirm=$_POST['confirm_password'];

  if($password!==$confirm){
    $_SESSION['message']="Passwords do not match!";
    header('Location: ../index.php#registerModal'); exit();
  }
  $hash=password_hash($password,PASSWORD_DEFAULT);
  $sql="INSERT INTO users (username,email,address,password) VALUES ('$username','$email','$address','$hash')";
  if($conn->query($sql)) $_SESSION['message']="Registration successful! You can now login."; 
  else $_SESSION['message']="Error: Email may already be registered.";
  header('Location: ../index.php#registerModal'); 
  $conn->close();
}
