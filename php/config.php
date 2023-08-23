<?php
$dbhost = 'localhost';
$dbname = 'userform';
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>