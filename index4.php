<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="icon" href="img/icon.jpg">
	<title>Register of Alternate Referals</title>
	<!-- Favicon code start -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<!-- Favicon code end -->
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <section class="top-nav">
    <div>
      Logo Here
    </div>
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
    <div class='menu-button'></div>
  </label>
    <ul class="menu">
      <li>Home</li>
      <li>Login</li>
      <li>Report Error/Change</li>
      <li>Four</li>
      <li>About</li>
    </ul>
  </section>

<body>
	<h2>Register of Alternate Referals</h2>
<br><br>
<img src="img/gps.png" alt="GPS locate" align="center" class="gps" width="60px" height="60px"/>
<br><br>
<!--
<div class="boxed">
Search box
</div>
-->
<!-- old palce holder
<input type="text" id="location_query" name="lq" placeholder="Input Postcode or Suburb" style="width: 175px";>
-->
<br>
	<form action="" method="post">
		<!-- action alone put the array into the URL going to the action address
		adding method="post" is more descrete and secure 
		in php $GET for simple passing as URL
		for post its in $POST [both called a super global]
		novalidate stops php from checking validation rules (like valid email)- will allow you to enter an invalid answer but will stop you return INVALID
		 -->
		<label for="PostcodeSuburb"></label>
		<input type="text" id="PostcodeSuburb" placeholder="Postcode or Suburb" Name="PostcodeSuburb" required>
			<br>
		<button>Send</button> <!-- when sent adds "?Category name result" to URL-->

	</form>

	<?php

					$data = filter_input_array(INPUT_POST, [
						"PostcodeSuburb" => null,
					]);

//					if (empty($data["PostcodeSuburb"])) {
//						die("Postcode / Suburb is required");
//					}
					// if statement checks PostcodeSuburb in $data array if empty runs next line, die() ends process and displays string in ""

					$host = "localhost";
					$dbname = "ards";
					$username = "query_bot";
					$password = "J(yqxK[9vHZBlDAq";
					// defines the 4 above values

					// mysql_connect($host, $username, $password, $dbname)
					//passes them into mysql- **must be in this order
					// or create them as a variable
					$conn = mysqli_connect(hostname: $host,
										 username: $username, 
										 password: $password, 
										 database: $dbname);
					if (mysqli_connect_errno()) {
						die("Connection error: " . mysqli_connect_error());
					}
					// checks if connection is made, if error errno= false (0). script will stop and and print error message including error code
							/* one option for passing info to sql*/
								$sql = "SELECT * FROM `ard` WHERE `concat` LIKE '%$data[PostcodeSuburb]%' ";
					/*			$sql = "INSERT INTO `ticket`(`name`, `email`, `description`, `priority`, `category`) VALUES (" .
									"'" . mysqli_real_escape_string($conn, $data["PostcodeSuburb"]) . "'," .
									"'" . mysqli_real_escape_string($conn, $data["email"]) . "'," .
									"'" . mysqli_real_escape_string($conn, $data["description"]) . "'," . 
									mysqli_real_escape_string($conn, $data["priority"]) . "," . 
									"'" . mysqli_real_escape_string($conn, $data["category"]) . "')";
								//variable containing sql code 'from phpmyadmin' but values added as a concatenated string from $data variables
								// string values ($) need to be surrounded by single quotes "'"
								//mysqli_real_escape_string removes special characters from string and prevents injection attacks
					*/
					//			echo $sql;
								// will show sql string on screen for validation
					$result = $conn->query($sql);
								if (mysqli_query($conn, $sql) === false) {
									die(mysqli_error($conn));
								}
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
					    echo $row["concat"] . "<BR>". "LHD" . " " . $row["lhd"] . " " . $row["service_name"] . " " . $row["service2"] .  " " . $row["service3"] . " " . $row["service4"] . "<br>";
					  }
					} else {
					  echo "0 results";
					}
								//passes query with connection string an sql to database, if error prints error
					/*		end option for passing in info to sql*/ 

					//$sql = "INSERT INTO `ticket`(`name`, `email`, `description`, `priority`, `category`) 
					//VALUES (?, ?, ?, ?, ?)";

					/*
					header("Location: success.html", response_code: 303);
					exit;
					*/
					?>
<br><br>
results
</body>
	<br><br><br>
<footer>
	<div class=checkered>
<span style="background-color: #ffffff" class="credit">Design &copy; GoblinEngine</span>
	
</div>
</footer>
</html>
