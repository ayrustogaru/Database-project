
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
			<h1 >Blood Inventory System</h1>
		</header>
	</div>
	<div class="main">
		<div class="form-header">
			<h3>DONOR REGISTRATION PAGE - FILL THE INFORMATION</h3>
		</div>
		<form name="reg_form" method="post" action="donor_sign_process.php">
			<ul class="form-list">
				<li class="form-element">
					<label class="form-label" for="email">Email:</label>
					<input type="email"maxlength="60" id="email" placeholder="user@example.com" name="email" pattern="[a-z0-9._+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="" required="required" />
					<span class="error"><?php if(isset($_SESSION["emailErr"])){echo htmlspecialchars($_SESSION["emailErr"]); $_SESSION["emailErr"]=NULL;}?></span>
				</li>
				<li class="form-element">
					<label class="form-label" for="pass">Password:</label>
					<input type="password" maxlength="40" id="pass" pattern="[A-Za-z0-9!@.]*" name="pass" required="required" />
					<span class="error"><?php if(isset($_SESSION["passErr"])){echo htmlspecialchars($_SESSION["passErr"]); $_SESSION["passErr"]=NULL;} ?></span>
				</li>
				<li class="form-element">
					<label class="form-label" for="conf_pass">Confirm Password:</label>
					<input type="password" maxlength="40" id="conf_pass" pattern="[A-Za-z0-9!@.]*" name="conf_pass" required="required" />
				</li>
				<li class="form-element">
					<label class="form-label" for="fname">First Name:</label>
					<input type="text" class="form-field" maxlength="60" id="fname" name="fname" pattern="[A-Za-zà-ýÀ-Ý0-9!@.ç ]*" value="" required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="lname">Last Name:</label>
					<input type="text" class="form-field" maxlength="60" id="lname" name="lname" pattern="[A-Za-zà-ýÀ-Ý0-9!@.ç ]*" value="" required="required">
				</li>	
				<li class="form-element">
					<label class="form-label" for="dob">Date of Birth:</label>
					<input type="date" class="form-field" id="dob" name="dob" patternvalue="" min="" required="required">
					<span class="error"><?php if(isset($_SESSION["dobErr"])){echo htmlspecialchars($_SESSION["dobErr"]); $_SESSION["dobErr"]=NULL;} ?></span>
				</li>
				<li class="form-element">
					<label class="form-label" for="hno">House Number:</label>
					<input type="text" class="form-field" maxlength="60" id="hno" name="hno" pattern="[A-Za-z0-9/-]*" value="" required="required">
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
					<label class="form-label" for="phno">Phone Number:</label>
					<input type="tel" class="form-field" maxlength="10" id="phno" name="phno" value="" pattern="[0-9]{10}" required="required">
				</li>
				<li class="form-element">
					<label class="form-label" for="gender" style="margin-right: 75px">Gender:</label>
	    			<input type="radio" name="gender" value="male" checked> Male
  	    		    <input type="radio" name="gender" value="female"> Female
 					<input type="radio" name="gender" value="other"> Other
				</li>
				<li class="form-element">
					<label class="form-label" for="blood_grp" style="margin-right: 155px">Blood Group:</label>
					<select id ="blood_grp" name="blood_grp" class="form-field" required="required">
						<option value="A">A</option>
    					<option value="A1">A1</option>
    					<option value="B">B</option>
    					<option value="A2">A2</option>
    					<option value="A1B">A1B</option>
    					<option value="A2B">A2B</option>
    					<option value="AB">AB</option>
    					<option value="Bombay Blood Group">Bombay Blood Group</option>
    					<option value="O">O</option>
  					</select>
				</li>
				<li class="form-element">
					<label class="form-label" for="rh" style="margin-right: 265px">Rhesus:</label>
					<select id ="rhesus" name="rh" required="required">
						<option value="positive">+ve</option>
    					<option value="negative">-ve</option>
  					</select>
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