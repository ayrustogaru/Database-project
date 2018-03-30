<?php 
$servername = "localhost";
$username = "root";
$password = "123456"

try{
	$conn = new PDO("mysql: host = $servername;dbname = myDB",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected Succesfully"
}
catch(PDOException $e){
	echo "Connection failed: " $e->getMessage();
}
?>