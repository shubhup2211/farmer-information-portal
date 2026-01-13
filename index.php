<?php
include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<body>

    <div class="hero">
        <h1>Welcome to Farmer Information Portal</h1>
        <p style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">This portal provides information about crops and government schemes.</p>

        <div class="card-container">
            <div class="card">
                <span class="card-title">Discover Crops</span>
                <a href="crops.php"> <img src="assests\images\crop.jpg" alt="Wheat Field" class="card-image"> </a>
            </div>

            <div class="card">
                <span class="card-title">Access Schemes</span>
                <a href="schemes.php"> <img src="assests\images\scheme.jpg" alt="Lion Capital Emblem" class="card-image"> </a>
            </div>
        </div>
    </div>

</body>
</html>

<?php
include("includes/footer.php");
?>
