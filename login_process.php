<?php
	require("conn.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		
		$email = test_input($_POST["email"]);
		$pass = md5('blah@#$'.sha1('3NhNj8&'.$_POST["pass"]) );
		if(strlen($_SESSION["emailErr"])==0 && strlen($_SESSION["passErr"])==0)
		{
			$stmt = $conn->prepare("select email,password from blood.donor where email = :email and password = :pass");
			$stmt-> bindParam(':email',$email);
			$stmt->bindParam(':pass',$pass);
			$stmt->execute();
			if($stmt->rowCount()==1)
			{
				$_SESSION["email"] = $email;
				$_SESSION["pass"] = $pass;
				header("Location: Donormain.php");	
				exit();
			}
			$stmt = $conn->prepare("select email,password from blood.bloodbank where email = :email and password = :pass");
			$stmt-> bindParam(':email',$email);
			$stmt->bindParam(':pass',$pass);
			$stmt->execute();
			if($stmt->rowCount()==1)
			{
				$_SESSION["email"] = $email;
				$_SESSION["pass"] = $pass;
				header("Location: BB_main.php");	
				exit();
			}
			$stmt = $conn->prepare("select email,password from blood.hospital where email = :email and password = :pass");
			$stmt-> bindParam(':email',$email);
			$stmt->bindParam(':pass',$pass);
			$stmt->execute();
			if($stmt->rowCount()==1)
			{
				$_SESSION["email"] = $email;
				$_SESSION["pass"] = $pass;
				header("Location: Hos_main.php");	
				exit();
			}
			else{
				$_SESSION["Err"] = "Invalid Email or Password";
				header("Location: login.php");
			}
		}
	}

		function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>