<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}

if(isset($_GET['delete'])){
	$scheme_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM schemes WHERE scheme_id = $scheme_id");
	header("Location: view_schemes.php");
}

$result = mysqli_query($conn, "SELECT * FROM schemes");
?>

<!DOCTYPE html>
<html>
<head>
<title> View schemes </title>
<link rel ="stylesheet" href ="../assests/css/style1.css">
</head>
<body>
<h2> Government Schemes</h2>

<table border="1" cellpadding="10">

<tr>
<th> Scheme Id </th>
<th> Scheme Name </th>
<th> Eligibility </th>
<th> Benefits </th>
<th> Action </th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td> <?php echo $row['scheme_id']; ?> </td>
<td> <?php echo $row['scheme_name'];?> </td>
<td> <?php echo $row['eligibility'];?> </td>
<td> <?php echo $row['benefits'];?> </td>
<td> 
<a href= "view_schemes.php?delete=<?php echo $row['scheme_id']; ?>"
onclick="return confirm('Are you sure?')"> Delete </a>
 </td>
</tr>

<?php } ?>

</table>

<p> <a href="dashboard.php"> Back to dashboard </a></p>

</body>
</html>