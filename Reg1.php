<!DOCTYPE html>
<html>
<head>
	<title>REGISTER SERVER</title>
	 <link rel="stylesheet" type="text/css" href="RegPage.css">
</head>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'Users';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['pass'];
$name = $_POST['name'];
$phno = $_POST['phno'];
$addr = $_POST['addr'];
$eAdr = $_POST['eAdr'];

echo "REGISTERED!";
// echo $userage;
// echo $userlat;
// echo $userlon;
//PASSWORD	UNAME	NAME	PHNO	ADDR


if($stmt = mysqli_prepare($conn, "INSERT INTO Users(PASSWORD, UNAME, NAME, PHNO,ADDR, eAdr) VALUES (?, ?, ?, ?,?,?)")) {
mysqli_stmt_bind_param($stmt, 'sssdss', $password, $username,$name,$phno,$addr,$eAdr);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}




//Close the connection
mysqli_close($conn);
echo '<script> alert("registered");window.location = "mainPage.html"</script>';
?>
</body>
</html>