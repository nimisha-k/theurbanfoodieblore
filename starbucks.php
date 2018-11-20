<!DOCTYPE html>
<html>
<head>
	<title>Starbucks</title>
</head>
<body>
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

		if(isset($_POST))
		{
			$nums = array($_POST['n1'], $_POST['n2'], $_POST['n3'] ,$_POST['n4'], $_POST['n5']);
			$names = array("Espresso", "Alphonso", "Coffee Frappuccino", "Christmas Cookie Frappuccino", "Pasta");
			$prices = array(200,250,200,270,180);
		}


		$i = 0;
		$flag = 0;

		while($i < 5)
		{
			if($stmt = mysqli_prepare($conn, "INSERT INTO order1(ITEM, PRICE, NUM) VALUES (?, ?, ?)")) {
			mysqli_stmt_bind_param($stmt, 'sdd', $names[$i], $prices[$i],$nums[$i]);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			}

			$i = $i + 1;
			$flag = 1;
		}

		//Close the connection
		mysqli_close($conn);
		if($flag == 1)
			echo '<script> alert("Your Order has been taken"); window.location = "checkout.php"</script>';
	?>
</body>
</html>