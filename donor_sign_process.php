<?php
	include("conn.php");
		session_start();
	$email = $pass = $conf_pass = $fname = $lname = $dob = $area = $city = $gender = $blood_grp = $rh = "";
	$hno = $phno = $dob= 0;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//$sql='select email from donor where email=?';
			$stmt = $conn->prepare('select email from blood.donor where email=:email');
			$stmt->bindParam(":email", $email);
			$email = test_input($_POST["email"]);
			$stmt->execute();
			if($stmt->rowCount()>0)
			{
				$_SESSION["emailErr"] = "Email address already exists.";
			}
		$pass = md5('blah@#$'.sha1('3NhNj8&'.$_POST['pass']) );
			$conf_pass = md5('blah@#$'.sha1('3NhNj8&'.$_POST['conf_pass']) );
		if(strcmp($pass,$conf_pass)!=0)
		{
				$_SESSION["passErr"] = "Passwords do not match.";
		}
		$dob2 = new DateTime(sanitize(($_POST["dob"])));
		$dob2->modify('+18 years');
		$dob3 = new DateTime("now");
		if ($dob3<$dob2) {
			$_SESSION["dobErr"] = "Must be over 18 years.";
		}
		if(strlen($_SESSION["emailErr"])==0 && strlen($_SESSION["passErr"])==0 && strlen($_SESSION["dobErr"])==0)
		{
			$sql_add = "insert into blood.donor(email,password,first_name,last_name,gender,house_no,area,city,DOB,ABO,rhesus,phone_no) values(?,?,?,?,?,?,?,?,?,?,?,?)";
			$fname = test_input($_POST["fname"]);
			$lname = test_input($_POST["lname"]);
			$dob2 = new DateTime(sanitize(($_POST["dob"])));
			$dob = $dob2->format('Y-m-d');
			$hno = test_input($_POST["hno"]);
			$area = test_input($_POST["area"]);
			$city = test_input($_POST["city"]);
			$gender = test_input($_POST["gender"]);
			$blood_grp = test_input($_POST["blood_grp"]);
			$rh = test_input($_POST["rh"]);
			$phno = test_input($_POST["phno"]);
			$stmt2 = $conn->prepare($sql_add);
			$stmt2->execute(array($email,$pass,$fname,$lname,$gender,$hno,$area,$city,$dob,$blood_grp,$rh,$phno));
			if($stmt2->rowCount()==1)
			{
				header("Location: login.php?success=true");
				exit();
			}
		}
		else
		{
			
			header("Location:Donor.php");
		}
	}


	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	function sanitize($data)
	{
		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>