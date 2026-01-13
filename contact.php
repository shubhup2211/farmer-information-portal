<?php
include("includes/db.php");
//Feedback message
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'] ;
	$email = $_POST['email'] ;
	$message = $_POST['message'] ;

    if($name != "" && $email != "" && $message != ""){
        $query = "INSERT INTO contact (name, email, message) VALUES ('$name','$email','$message')";

        if(mysqli_query($conn,$query)){
            $success = "Your message sent successfully!";
            } else {
                $success = "Something went wrong!";
            }                
    } else {
        $success = "All fields required!";
    }
} 
?>

<?php include("includes/header.php"); ?>


<div class="contact-hero">
    
    <div class="message"> <?php if ($success != "") {echo "<p>$success</p>";}?> </div>
        
        <h1 class="page-title">Contact Us</h1>

        <div class="contact-box">
            <form action="" method="POST">
                
                <label class="contact-label">Name:</label>
                <input type="text" name="name" class="contact-input" placeholder="Enter your name" required>

                <label class="contact-label">Email:</label>
                <input type="email" name="email" class="contact-input" placeholder="Enter your email" required>

                <label class="contact-label">Message:</label>
                <textarea name="message" class="contact-input" rows="4" placeholder="Enter your query or request" required></textarea>

                <button type="submit" name="submit" class="submit-btn">Submit</button>

            </form>
        </div>

    </div>

<?php include("includes/footer.php"); ?>
