<?php
session_start();
include '../../backend/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/profile.css">
</head>
<body>
    <?php include '../navbar.php' ?>

    <div class="profile_container">
        <div class="profile_image">
            <img src="../../image/01.jpg" alt="">
            <button class="profile_edit_button">Edit Profile</button>
        </div>
        <div class="profile_info">
            <div class="basic_info">
                <div>
                    <h1>Dhurba Pandey</h1>
                </div>
                <div>
                    <p class="bio">
                        I'm a Senior Software Developer with 8+ years in creating scalable web apps, 
                        focusing on user experience and security. 
                        I love contributing to open-source projects and solving complex tech challenges. 
                        Let's connect!
                    </p>
                </div>
                <div class="info">
                    <h4>example@gamil.com</h4>
                    <h4>Kathmandu, Balaju</h4>
                    <h4>+9867565656</h4>
                </div>
            </div>
    </div>
</body>
</html>