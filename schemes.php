<?php
include("includes/db.php");
include("includes/header.php");

$query = "SELECT * FROM schemes";
$result = mysqli_query($conn, $query);
?>

<div class="schemes-hero">
    <h1 class="page-title">Schemes Information</h1>

    <div class="schemes-container">
        
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="scheme-card">
                
                <h2 class="scheme-name">
                    <?php echo $row['scheme_name']; ?>
                </h2>
                
                <div class="scheme-info">
                    <span class="label-yellow">• Eligibility :</span>
                    <?php echo $row['eligibility']; ?>
                </div>

                <div class="scheme-info">
                    <span class="label-yellow">• Benefits :</span>
                    <?php echo $row['benefits']; ?>
                </div>

            </div>
        <?php
        }
        ?>

    </div>
</div>

<?php include("includes/footer.php"); ?>