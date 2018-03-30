<?php
	require("conn.php");
	session_start();
	if (isset($_POST['donor'])) {
    //update action
		header("Location:Donor.php");
		exit();
	} else if (isset($_POST['blood_bank'])) {
    //delete action
		header("Location:Bloodbank.php");
		exit();
	} else if(isset($_POST['hospital'])){
    //no button pressed
		header("Location:Hospital.php");
		exit();
	} else{
		header("Location:login.php");
		exit();
	}
?>