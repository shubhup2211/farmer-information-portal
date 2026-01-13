<?php
include("includes/db.php");
include("includes/header.php");

$query = "SELECT * FROM crops";
$result = mysqli_query($conn, $query);
?>

<div class="crops-hero">
    <h1 class="page-title">Crops Information</h1>

    <div class="flip-card-container">

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $imagePath = $row['crop_image']; 
        ?>

        <div class="flip-card" onclick="this.classList.toggle('flipped')">
            <div class="flip-card-inner">
                
                <div class="flip-card-front">
                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $row['crop_name']; ?>" class="front-bg-image">

                    <div class="gradient-overlay"></div>
                    
                    <div class="front-content">
                        <h2 class="crop-name"><?php echo $row['crop_name']; ?></h2>
                        <p class="crop-season">
                            <span style="color:#FFFF00;">Season :</span> 
                            <?php echo $row['season']; ?>
                        </p>
                    </div>

                    <div class="flip-instruction">
                        <i class="fas fa-sync-alt"></i>
                        <span>flip</span>
                    </div>
                </div>

                <div class="flip-card-back">

                    <div class="back-content">
                        <h3 class="back-title">Description</h3>
                        <p class="back-desc">
                            <?php echo $row['description']; ?>
                        </p>
                    </div>

                    <div class="flip-instruction">
                        <i class="fas fa-sync-alt"></i>
                        <span>flip back</span>
                    </div>
                </div>

            </div>
        </div>
        <?php
        } // End While Loop
        ?>

    </div> </div> <?php include("includes/footer.php"); ?>