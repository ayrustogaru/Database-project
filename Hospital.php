
<!DOCTYPE html>
<html lang="en-US">
<?php
 	require("conn.php");
	session_start();
?>
<head>
  <meta charset="UTF-8">
  <title>Blood Inventory-login or sign up </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/regstyle.css">
  </head>

<body>
	<div class="title">
		<header>
			<h1>Blood Inventory System</h1>
		</header>
	</div>
	<div class="main">
		<div class="form-header">
			<h3>HOSPITAL REGISTRATION PAGE - FILL THE INFORMATION</h3>
		</div>
		<form name="reg_form" method="post" action="hospital_sign_process.php">
			<ul class="form-list">
				<li class="form-element">
					<label class="form-label" for="email">Email</label>
					<input type="email"maxlength="60" id="email" name="email" placeholder="user@example.com" pattern="[a-z0-9._+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="" required="required" />
					<span class="error"><?php if(isset($_SESSION["emailErr"])){echo htmlspecialchars($_SESSION["emailErr"]); $_SESSION["emailErr"]=NULL;}?></span>
				</li>
				<li class="form-element">
					<label class="form-label" for="pass">Password:</label>
					<input type="password" maxlength="40" id="pass" pattern="[A-Za-z0-9!@.]*" name="pass" required="required" />
					<span class="error"><?php if(isset($_SESSION["passErr"])){echo htmlspecialchars($_SESSION["passErr"]); $_SESSION["passErr"]=NULL;}?></span>
				</li>
				<li class="form-element">
					<label class="form-label" for="conf_pass">Confirm Password:</label>
					<input type="password" maxlength="40" pattern="[A-Za-z0-9!@.]*" id="conf_pass" name="conf_pass" required="required" />
				</li>
				<li class="form-element">
					<label class="form-label" for="name">Hospital Name:</label>
					<input type="text" class="form-field" maxlength="60" id="name" name="name" pattern="[A-Za-zà-ýÀ-Ý0-9!@.ç ]*" value="" required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="sno">Street Number:</label>
					<input type="text" class="form-field" maxlength="60" id="sno" name="sno" pattern="[A-Za-zà-ýÀ-Ý0-9!@.ç ]*" value="" required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="area">Area:</label>
					<input type="text" class="form-field" maxlength="60" id="area" name="area" pattern="[A-Za-zà-ýÀ-Ýç ]*" value="" required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="city">City:</label>
					<input type="text" class="form-field" maxlength="60" id="city" name="city" pattern="[A-Za-zà-ýÀ-Ýç ]*" value="" required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="open_time">Opening Time:</label>
					<input type="time" class="form-field" id="open_time" name="open_time"  required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="close_time">Closing Time:</label>
					<input type="time" class="form-field" id="close_time" name="close_time"  required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="phno">Contact Number:</label>
					<input type="tel" class="form-field" maxlength="10" id="phno" name="phno" value="" pattern="[0-9]{10}|[0-9-]{11}" required="required">
				</li>
				<input type="submit" value="REGISTER" class="button" style="background: #1e75aa;"/>
			</ul>
		</form>
	</div>
</body>

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>