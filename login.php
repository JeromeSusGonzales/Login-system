<?php
session_start();
include("functions.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./css/log.css">
  <title>log in</title>
</head>

<body class="text-center">
  <?php

  if (isset($_POST['signin'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $query = "SELECT * from `accounts`;";
    if (count(fetchAll($query)) > 0) { //this is to catch unknown error.
      foreach (fetchAll($query) as $row) {
        if ($row['email'] == $email && $row['password'] == $password) {
          $_SESSION['login'] = true;
          $_SESSION['type'] = $row['type'];
          header('location:home.php');
        } else {
          echo "<script>alert('Wrong login details.')</script>";
        }
      }
    } else {
      echo "<script>alert('Error.')</script>";
    }
  }

  ?>
<div class="container">
  <div class="wrapper">
    <header>Login</header>
    <form action="login.php" method="post">
      <div class="field email">
        <div class="input-area">
          <input  name="email"  type="text" placeholder="Email Address">
        </div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input  name="password" type="password" placeholder="Password">
        </div>
      </div>
      <input  name="signin" type="submit" value="Login">
      <p>Not a Member?</p><a href="signup.php"> Click to Register</a>
    </form>
  </div>
</div>
  
</body>

</html>