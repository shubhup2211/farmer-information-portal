<?php

session_start();
include("../includes/db.php");

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}


if(isset($_GET['delete'])){
	$crop_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM crops WHERE crop_id=$crop_id");
	header("Location: view_crop.php");
}
?>

<?php
//Fetch all records from crops
$result = mysqli_query($conn, "SELECT * FROM crops");
?>

<!DOCTYPE html>
<html>
<head>
<title> View Crops </title>
<link rel ="stylesheet" href ="../assests/css/style1.css">
</head>

<body>

<h2> Crop list </h2>

<table border="1" cellpadding="10">

<tr>
<th>Crop Id</th>
<th>Crop Name</th>
<th>Season</th>
<th>Description</th>
<th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
	
<tr>
<td> <?php echo $row['crop_id'] ?> </td>
<td> <?php echo $row['crop_name'] ?> </td>
<td> <?php echo $row['season'] ?> </td>
<td> <?php echo $row['description'] ?> </td>
<td>
<a href="view_crop.php?delete=<?php echo $row['crop_id'];?>"
onclick = "return confirm('Are you sure?')"> Delete
</td>
</tr>

<?php } ?>
</table>

<p> <a href="dashboard.php"> Back to dashboard</a></p>
</body>
</html>