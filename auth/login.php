<?php
session_start();
include '../config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
  $email=$conn->real_escape_string($_POST['email']);
  $password=$_POST['password'];
  $sql="SELECT * FROM users WHERE email='$email' LIMIT 1";
  $res=$conn->query($sql);
  if($res->num_rows==1){
    $user=$res->fetch_assoc();
    if(password_verify($password,$user['password'])){
      $_SESSION['user_id']=$user['id'];
      $_SESSION['username']=$user['username'];
      $_SESSION['message']="Welcome, ".$user['username']."!";
      header('Location: ../dashboard.php');
    } else { $_SESSION['message']="Incorrect password!"; header('Location: ../index.php#loginModal'); }
  } else { $_SESSION['message']="Email not found!"; header('Location: ../index.php#loginModal'); }
  $conn->close();
}
