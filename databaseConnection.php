<?php

// Server name must be localhost
$serverName = "localhost";

// In my case, user name will be root
$userName = "root";
//$userName = "id17280129_jayachandra";
// Password is empty
$password = "";
//$password = "p)DFDkQ3kzaYH~\9";
// Database Name
$dbName = "dnms";
//$dbName = "id17280129_bloodbank";

// Creating a connection
$connect =  mysqli_connect($serverName,$userName, $password,$dbName);

// Check connection
if (!$connect || $connect->connect_error) {
	die("Connection failed: " . mysqli_connect_error());
}


// if(password_verify($HospitalPassword, $hashed_password)) {
// 	// If the password inputs matched the hashed password in the database
// 	// Do something, you know... log them in.
// 	$msg="sssssssssssssssssssss";
// } 