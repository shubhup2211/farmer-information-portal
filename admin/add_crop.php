<?php

session_start();
include("../includes/db.php");

//Check admin is valid or not
if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$crop_name = $_POST['crop_name']?? '';
	$season = $_POST['season']?? '';
	$description = $_POST['description']?? '';
	
	if($crop_name !="" && $season !="" && $description !=""){
		$query = "INSERT INTO crops (crop_name, season, description) VALUES ('$crop_name','$season','$description')";
		
		if (mysqli_query($conn, $query)){
			$msg = "Crop Added Successfully";
		} else {
			$msg = " Error Adding Crop!";
			}
			
	}else {
		$msg = "All fields required!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Add Crop </title>
<link rel ="stylesheet" href ="../assests/css/style1.css">
</head>
<body>

<h2> Add Crop </h2>

<?php if (isset($msg)) echo "<p>$msg</p>"; ?>

<form method='post'>

<label> Crop Name </label> <br>
<input type="text" name="crop_name" required> <br><br>

<label> Season </label> <br>
<input type="text" name="season" required> <br> <br>

<label> Description </label> <br>
<textarea name="description" required> </textarea><br> <br>

<button type="submit" name="submit"> Submit </button>

<p> <a href ="dashboard.php"> Back to dashboard </a></p>

</form>
</body>
</html>