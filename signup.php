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
  <title>Sign Up</title>
</head>
<?php
if (isset($_POST['signup'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $message = "$lastname $firstname would like to request an account.";
  $query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`, `message`, `date`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$message', CURRENT_TIMESTAMP)";
  if (performQuery($query)) {
    echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
  } else {
    echo "<script>alert('Unknown error occured.')</script>";
  }
}

?>

<body>
  <div class="container">
    <div class="wrapper">
      <header>Register</header>
      <form action="#" method="post">
        <div class="field email">
          <div class="input-area">
            <input name="firstname" type="text" placeholder="FirstName">
          </div>
          <div class="field password">
            <div class="input-area">
              <input name="lastname" type="text" placeholder="LastName">
            </div>
            <div class="field email">
              <div class="input-area">
                <input name="email" type="text" placeholder="Email Address">
              </div>
            </div>
            <div class="field password">
              <div class="input-area">
                <input name="password" type="password" placeholder="Password">
              </div>
            </div>
            <input name="signup" type="submit" value="Register">
            <a href="login.php">Go back to Login Page</a>
      </form>
    </div>
  </div>
</body>
</html>