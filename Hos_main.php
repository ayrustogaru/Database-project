
<!DOCTYPE html>
<html lang="en-US">
<?php
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
  		<a href="#home">Home</a>
  		<a href="#news">History</a>
  		<a href="hos_det.php">Details</a>
      <a href="logout.php" style="float: right">Logout</a>
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