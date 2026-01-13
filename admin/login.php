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
<link rel ="stylesheet" href ="../assests/css/style.css">
<link rel ="stylesheet" href ="../assests/css/style_contact.css">
</head>
<body>

<div class="contact-hero">
	
	    <div class="message"> <?php if (isset($msg)) echo "<p>$error</p>"; ?> </div>
        
        <h1 class="page-title">Admin Login</h1>

        <div class="contact-box">
            <form action="" method="POST">
                
                <label class="contact-label">UserName:</label>
                <input type="text" name="username" class="contact-input" placeholder="Enter Username" required>

                <label class="contact-label">Password:</label>
                <input type="password" name="password" class="contact-input" placeholder="Enter Password" required>

                <button type="submit" name="login" class="submit-btn">Login</button>

            </form>
        </div>
    </div>
</body>
</html>