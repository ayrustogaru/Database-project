<?php
  require("conn.php");
  session_start();
  session_destroy();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <title></title>/*Add the title of the page*/
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  
  <link rel="stylesheet" href="css/style.css">
  <style>
    .option:hover,.option:active,.option:focus
    {
      background: #66b3ff;
      color: white;
    }
  </style>
</head>


<div class="login-page">
  <div class="form">
    <form class="register-form" method="post" action="register.php">
      <p><b>Register yourself as a</b></p>
      <input type="submit" name="Donor" value="Donor" class="option" />
      <input type="submit" name="blood_bank" value="Blood Bank" class="option" />
      <input type="submit" name="hospital" value="Hospital" class="option" />
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post" action="">
      <input type="text" placeholder="Email Address"/>
      <input type="password" placeholder="Password"/>
      <input type="submit" value="LOGIN" class="button" style="background: #1e75aa;"/>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="js/func.js"></script>
</html>

<?php



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>