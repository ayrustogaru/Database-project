
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
  <link rel="stylesheet" href="css/page_style.css">
  </head>

<body>
	<div class="title">
		<header>
			<h1 >Blood Inventory System</h1>
		</header>
	</div>
	<div class="navbar">
  		<a href="Donormain.php">Home</a>
  		<a href="#news">History</a>
  		<a href="don_det.php">Details</a>
      <a href="logout.php" style="float: right">Logout</a>
      </div>
  
   <div class="main">

   <?php

    $stmt = $conn->prepare("SELECT * from blood.donor where email = :email and password = :pass"); 
    $stmt-> bindParam(':email',$_SESSION["email"]);
    $stmt->bindParam(':pass',$_SESSION["pass"]);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($stmt->fetchAll()),RecursiveIteratorIterator::LEAVES_ONLY);
    foreach($iterator as $k=>$v) {
        if($k!="password") 
        {
          echo "<p>".test_input(str_replace("_"," ",ucfirst($k))).": &nbsp;".test_input($v)."</p>";
        }
    }
  
   ?>
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