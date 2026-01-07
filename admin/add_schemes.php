<?php

session_start();
include("../includes/db.php");

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$scheme_name = $_POST['scheme_name'] ?? '';
	$eligibility = $_POST['eligibility'] ?? '' ;
	$benefits = $_POST['benefits'] ?? '' ;
	
	if($scheme_name !="" && $eligibility !="" && $benefits !=""){
		
		$query = "INSERT INTO schemes(scheme_name, eligibility, benefits) VALUES ('$scheme_name','$eligibility','$benefits')";
		
		if(mysqli_query($conn,$query)){
			$msg = "Scheme added successfully";
			} else {
				$msg = "Error while adding scheme";
			}
			
	} else {
		$msg= "All fields required";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Add scheme </title>
<link rel ="stylesheet" href ="../assests/css/style1.css">
</head>
<body>
<h2> Add Government scheme </h2>

<?php if (isset($msg)) echo "<p>$msg</p>"; ?>


<form method='post'>

<label> Scheme name: </label> <br>
<input type="text" name="scheme_name" required> <br> <br>

<label> Eligibility: </label> <br>
<textarea name="eligibility" required> </textarea> <br><br>

<label> Benefits: </label> <br>
<textarea name="benefits" required> </textarea> <br> <br>

<button type="submit" name="submit"> Submit </button>

<p> <a href="dashboard.php">Back to dashboard</a></p>

</form>
</body>
</html>