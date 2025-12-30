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
            <button>edit profile</button>
        </div>
        <div class="profile_info">
            <div class="basic_info">
                <div>
                    <span>Dhurba Pandey</span>
                </div>
                <div>
                    <p>I'm a Senior Software Developer with 8+ years in creating scalable web apps, 
                        focusing on user experience and security. 
                        I love contributing to open-source projects and solving complex tech challenges. 
                        Let's connect!
                    </p>
                </div>
                <div class="info">
                    <span>example@gamil.com</span>
                    <span>Kathmandu, Balaju</span>
                    <span>+9867565656</span>
                    <span>4th December, 2000</span>
                    <span>gender</span>
                </div>
            </div>
    
            <div class="professional_info">
                <div>
                    <span>Current Job: none</span>
                    <span>experience: none</span>
                </div>
                <div>
                    
                </div>
                <div>
                    
                </div>
            </div>
        </div>

    </div>
</body>
</html>