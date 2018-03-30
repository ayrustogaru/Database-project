<?php
  require("conn.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<?php
  if (isset($_GET['success'])) {
      echo"<script type=\"text/javascript\">".
            "alert('Registered successfully');".
            "</script>";
  }
  session_destroy();
  session_start();
?>
<head>
  <meta charset="UTF-8">
  <title>Blood Inventory-login or sign up </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  
  <link rel="stylesheet" href="css/style.css">
  <style>
    .option:hover,.option:active,.option:focus
    {
      background: #66b3ff;
      color: white;
      cursor: pointer;
    }
  </style>
</head>

<body>


<div class="login-page">
  <div class="form">
    <form class="register-form" method="post" action="option_process.php">
      <p><b>Register yourself as a</b></p>
      <input type="submit" name="donor" value="Donor" class="option" />
      <input type="submit" name="blood_bank" value="Blood Bank" class="option" />
      <input type="submit" name="hospital" value="Hospital" class="option" />
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post" action="login_process.php">
      <span class="error"><?php if(isset($_SESSION["Err"])){echo htmlspecialchars($_SESSION["Err"]); $_SESSION["Err"]=NULL;} session_destroy();session_start(); ?></span>
      <input type="text" placeholder="Email Address" name="email" required = "required"/>
      <input type="password" placeholder="Password" name ="pass" required = "required"/>
      <input type="submit" value="LOGIN" class="button" style="background: #1e75aa;"/>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="js/func.js"></script>
</html>

