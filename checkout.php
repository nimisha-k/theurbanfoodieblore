<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<script type="text/javascript">
		function foo()
		{
			window.location = "cart.html"
		}
	</script>
</head>
<body>
	<?php 
	$connect = new mysqli('localhost', 'root', '', 'Users');

	if($connect->connect_error)
	{
		die("connection failed");
	}
	

	$query="SELECT * FROM order1";
	$results = mysqli_query($connect,$query);
	$total=0;

	echo "<h1> Your bill </h1>";


	while ($row = mysqli_fetch_array($results)) {

    echo $row[0].":    ".$row[1]."Rs       Qty:".$row[2]."   <br>";
	//display entire cart ;
	//take email , credit card
    $total+=$row[1]*$row[2];


	}	
	echo "<br>TOTAL: ".$total."Rs<br>";
	$query="TRUNCATE order1";
	$results = mysqli_query($connect,$query);
	echo '<button onclick="foo()">Proceed to checkout</button>';

	//cxcccc x$res = $connect->query($sql);
	 ?>
</body>
</html>