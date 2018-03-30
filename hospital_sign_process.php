<?php
	require("conn.php");
	session_start();
		$email = $pass = $conf_pass = $name = $area = $city = $open_time = $close_time = "";
		$sno = $phno = 0;
		// $_SESSION["emailErr"] = NULL;
		// $_SESSION["passErr"] = NULL;
		 $success="";
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			//$sql='select email from donor where email=?';
				$email = test_input($_POST["email"]);
				$stmt = $conn->prepare('select email from blood.hospital where email=:email');
				$stmt->bindParam(":email", $email);
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

			if(strlen($_SESSION["emailErr"])==0 && strlen($_SESSION["passErr"])==0)
			{
				$sql_add = "insert into blood.hospital(email,password,hospital_name,street_no,area,city,opening_time,closing_time,phone_no) values(?,?,?,?,?,?,?,?,?)";
				$name = test_input($_POST["name"]);
				$sno = test_input($_POST["sno"]);
				$area = test_input($_POST["area"]);
				$city = test_input($_POST["city"]);
				$phno = test_input($_POST["phno"]);
				$stmt2 = $conn->prepare($sql_add);
				$stmt2->execute(array($email,$pass,$name,$sno,$area,$city,test_input($_POST["open_time"]),test_input($_POST["close_time"]),$phno));
				if($stmt2->rowCount()==1)
				{
					header("Location: login.php?success=true");
					exit();
				}
			}
			else
			{
				header("Location:Hospital.php");
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



