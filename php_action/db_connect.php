<?php 

$servername = "127.0.0.1";
$username = "root";
$password = "uc";
$dbname = "donasi";

// create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// check connection 
if($connect->connect_error) {
	die("Connection Failed : " . $connect->connect_error);
} else {
	// echo "Successfully Connected";
}