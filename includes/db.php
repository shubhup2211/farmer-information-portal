<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "farmer_portal";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
?>
