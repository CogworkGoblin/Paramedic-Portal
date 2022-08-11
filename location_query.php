<?php
// from https://www.raghwendra.com/blog/how-to-connect-html-to-database-with-mysql-using-php-example/
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'query_bot', 'J(yqxK[9vHZBlDAq','ards');

// get the post records
$query_location = $_POST['query_location'];

// database insert SQL code
$sql = "SELECT * FROM `ard` WHERE `concat` LIKE '$query_location'";

		// insert in database 
//$rs = mysqli_query($con, $sql);

//	if($rs)
//	{
//		echo "Contact Records Inserted";
//	}

?>