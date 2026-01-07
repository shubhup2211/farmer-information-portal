<?php
session_start();
include("../includes/db.php");

if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result)==1){
		$_SESSION['admin'] = $username;
		header("Location: dashboard.php");
	} else {
		$error = "Invalid Login Credentials!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Admin Login </title>
<link rel ="stylesheet" href ="../assests/css/style1.css">
</head>
<body>

<h2> Admin Login </h2>

<?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

<form method = "post" >

<label> Username: </label> <br>
<input type="text" name="username" required> <br> <br>

<label> Password: </label> <br>
<input type="password" name="password" required> <br> <br>

<button type="submit" name="login"> Login </button>
</form>

</body>
</html>