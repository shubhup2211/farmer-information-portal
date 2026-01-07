<?php
include("includes/db.php");
include("includes/header.php");

$query = "SELECT * FROM crops";
$result = mysqli_query($conn, $query);
?>

<h2>Crop Information</h2>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div style="background:white; padding:10px; margin:10px;">
        <h3><u><?php echo $row['crop_name']; ?></u></h3>
        <p><strong>Season:</strong> <?php echo $row['season']; ?></p>
        <p><strong>Description:</strong><?php echo $row['description']; ?></p>
    </div>
<?php
}
?>
<?php include("includes/footer.php"); ?>
