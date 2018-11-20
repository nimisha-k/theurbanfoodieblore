<!DOCTYPE html>
<html>
<head>
	<title>'name' Ordering Service</title>
	<?php
	$connect = new mysqli('localhost', 'root', '', 'Users');

	if($connect->connect_error)
	{
		die("connection failed");
	}
	

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT NAME FROM `Users` WHERE UNAME = '$username' AND PASSWORD ='$password'";

	$res = $connect->query($sql);
	
	$row = $res->fetch_assoc();
	
	if($res->num_rows > 0)
	{
		echo '<script type="text/javascript"> alert("Login Successful")</script>';
		echo '<script type="text/javascript"> window.location="foodPage.html" </script>';
	}
	else
	{
		echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
		echo '<script type="text/javascript"> window.location="mainPage.html" </script>';
	}
?>
</head>
<body>
</body>
</html>

