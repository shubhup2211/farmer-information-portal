<?php

session_start();

if(!isset($_SESSION['admin'])){
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard - Farmer's Friend</title>
    
    <link rel="stylesheet" href="../assests/css/style_admin.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="admin-wrapper">
        
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="profile-icon">
                    <i class="far fa-user"></i>
                </div>
                <h2>Admin<br>Dashboard</h2>
            </div>

            <ul class="sidebar-menu">
                <li> <a href="add_crop.php"> <i class="fas fa-plus-square"></i> Add Crop </a> </li>
                
                <li> <a href="view_crop.php"> <i class="fas fa-eye"></i> View Crops </a> </li>

                <li> <a href="add_schemes.php"> <i class="fas fa-plus-square"></i> Add Scheme </a> </li>

                <li> <a href="view_schemes.php"> <i class="fas fa-eye"></i> View Schemes </a> </li>

                <li> <a href="logout.php"> <i class="fas fa-cog"></i> Logout </a> </li>
            </ul>
        </nav>

        <main class="main-content">
            <div class="welcome-text">
                <h1>Welcome<br><span>Admin</span></h1>
            </div>
        </main>

    </div>
</body>
</html>