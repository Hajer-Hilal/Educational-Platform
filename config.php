<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = mysqli_connect($servername, $username, $password);
	$db = mysqli_select_db($conn,'edu');

	// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	 // echo "Connected successfully";
  }


?>