<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}

if(isset($_GET['delete'])){
	$scheme_id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM schemes WHERE scheme_id = $scheme_id");
	header("Location: view_schemes.php");
}

$result = mysqli_query($conn, "SELECT * FROM schemes");
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
            
            <h1 class="page-title">Schemes Information</h1>

            <table class="crop-table">
                <thead>
                    <tr>
                        <th>Scheme ID</th>
                        <th>Scheme Name</th>
                        <th>Eligibility</th>
                        <th>Benefits</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['scheme_id']; ?></td>
						
						<td><?php echo $row['scheme_name']; ?></td>
                        
                        <td style="max-width: 300px;"> <?php echo $row['eligibility']; ?></td>
                        
                        <td style="max-width: 300px;"> <?php echo $row['benefits']; ?></td>

                        <td> <a href="view_schemes.php?delete=<?php echo $row['scheme_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this scheme?')">
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