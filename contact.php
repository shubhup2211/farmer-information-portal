<?php
//Feedback message
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'] ??'';
	$email = $_POST['email'] ??'';
	$message = $_POST['message'] ??'';
	
	if($name != "" && $email != "" && $message != ""){
		$success = "Your message received successfully";
	} else {
		$success = "All fields required!";
	}
} 
?>

<?php include("includes/header.php"); ?>

<h2>Contact Us</h2>

<?php
if ($success != "") {
    echo "<p>$success</p>";
}
?>

<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Message:</label><br>
    <textarea name="message" required></textarea><br><br>

    <button type="submit">Send Message</button>
</form>

<?php include("includes/footer.php"); ?>
