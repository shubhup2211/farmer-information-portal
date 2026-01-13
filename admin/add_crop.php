<?php

session_start();
include("../includes/db.php");

//Check admin is valid or not
if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$crop_name = $_POST['crop_name'] ;
	$season = $_POST['season'] ;
	$description = $_POST['description'] ;
	$crop_image_url = mysqli_real_escape_string($conn, $_POST['crop_image']) ;
	
	if($crop_name !="" && $season !="" && $description !=""){
		$query = "INSERT INTO crops (crop_name, season, description, crop_image) VALUES ('$crop_name','$season','$description','$crop_image_url')";
		
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
<link rel ="stylesheet" href ="../assests/css/style.css">
<link rel ="stylesheet" href ="../assests/css/style_contact.css">
</head>
<body>

<div class="contact-hero">
	
	    <div class="message"> <?php if (isset($msg)) echo "<p>$msg</p>"; ?> </div>
        
        <h1 class="page-title">Add Crop</h1>

        <div class="contact-box">
            <form action="" method="POST">
                
                <label class="contact-label">Name:</label>
                <input type="text" name="crop_name" class="contact-input" placeholder="Enter crop name" required>

                <label class="contact-label">Season:</label>
                <input type="text" name="season" class="contact-input" placeholder="Enter season (e.g., Rabi)" required>

                <label class="contact-label">Description:</label>
                <textarea name="description" class="contact-input" rows="3" placeholder="Enter information about crop" required></textarea>

                <label class="contact-label">Image URL:</label>
                <input type="url" name="crop_image" class="contact-input" placeholder="Enter Image address from unsplash" required>

                <button type="submit" name="submit" class="submit-btn">Submit</button>

            </form>
        </div>

        <a href="dashboard.php" style="color: white; text-decoration: none; margin-top: 20px; font-size: 1.1rem;"> Back to dashboard </a>

    </div>
</body>
</html>