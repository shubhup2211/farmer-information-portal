<?php

session_start();
include("../includes/db.php");

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}


if(isset($_GET['delete'])){
	$crop_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM crops WHERE crop_id=$crop_id");
	header("Location: view_crop.php");
}
?>

<?php
//Fetch all records from crops
$result = mysqli_query($conn, "SELECT * FROM crops");
?>

<!DOCTYPE html>
<html>
<head>
<title> View Crops </title>
<link rel ="stylesheet" href ="../assests/css/style_admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<div class="view-hero">
        
        <div class="table-box">
            
            <h1 class="page-title">Crops Information</h1>

            <table class="crop-table">
                <thead>
                    <tr>
                        <th>Crop ID</th>
                        <th>Crop Name</th>
                        <th>Season</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td> <?php echo $row['crop_id']; ?></td>
						
						<td> <?php echo $row['crop_name']; ?></td>
                        
                        <td> <?php echo $row['season']; ?></td>
                        
                        <td style="max-width: 300px;"> <?php echo $row['description']; ?></td>

                        <td> <img src="<?php echo $row['crop_image']; ?>" class="table-img" alt="Crop"  height="15px"width="100%"> </td>

                        <td> <a href="view_crop.php?delete=<?php echo $row['crop_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this crop?')">
                             <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>

        </div>

        <a href="dashboard.php" style="color: white; text-decoration: none; font-size: 1.1rem;"> Back to dashboard </a>

    </div>
</body>
</html>