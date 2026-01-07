<?php
include("includes/db.php");
include("includes/header.php");

$query = "SELECT * FROM schemes";
$result = mysqli_query($conn, $query);
?>

<h2>Schemes Information</h2>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div style="background:white; padding:10px; margin:10px;">
        <h3><u><?php echo $row['scheme_name']; ?></u></h3>
        <p><strong>Eligibility:</strong> <?php echo $row['eligibility']; ?></p>
        <p><strong>Benefits:</strong><?php echo $row['benefits']; ?></p>
    </div>
<?php
}
?>
<?php include("includes/footer.php"); ?>