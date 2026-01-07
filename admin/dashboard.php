<?php

session_start();

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel ="stylesheet" href ="../assests/css/style1.css">
</head>
<h2> Admin Dashboard </h2>

<p> Welcome, <?php echo $_SESSION['admin']; ?> </p>

<ul>
<li> <a href="add_crop.php"> Add Crop </a></li>
<li> <a href="view_crop.php"> View Crop </a></li>
<li> <a href="add_schemes.php"> Add Scheme </a></li>
<li> <a href="view_schemes.php"> View Schemes </a></li>
<li> <a href="logout.php"> Logout </a></li>
</ul>
</html>
