<?php

session_start();
include("../includes/db.php");

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$scheme_name = $_POST['scheme_name'] ;
	$eligibility = $_POST['eligibility'] ;
	$benefits = $_POST['benefits'] ;
	
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
<title> Add Crop </title>
<link rel ="stylesheet" href ="../assests/css/style.css">
<link rel ="stylesheet" href ="../assests/css/style_contact.css">
</head>
<body>

<div class="contact-hero">
	
	    <div class="message"> <?php if (isset($msg)) echo "<p>$msg</p>"; ?> </div>
        
        <h1 class="page-title">Add Scheme</h1>

        <div class="contact-box">
            <form action="" method="POST">
                
                <label class="contact-label">Name:</label>
                <input type="text" name="scheme_name" class="contact-input" placeholder="Enter scheme name" required>

                <label class="contact-label">Eligibility:</label>
                <textarea name="eligibility" class="contact-input" rows="3" placeholder="Enter eligibility about scheme" required></textarea>

                <label class="contact-label">Benefits:</label>
                <textarea name="benefits" class="contact-input" rows="3" placeholder="Enter benefits of scheme" required></textarea>

                <button type="submit" name="submit" class="submit-btn">Submit</button>

            </form>
        </div>

        <a href="dashboard.php" style="color: white; text-decoration: none; margin-top: 20px; font-size: 1.1rem;"> Back to dashboard </a>

    </div>
</body>
</html>