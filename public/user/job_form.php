<?php
session_start(); 
include '../../backend/user/job_form.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Form</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/navbar.css">
</head>
<body>

    <?php include "../navbar.php"; ?>

    <div class="container">
        <h3>Job Form</h3>        
        <form class="label_form" action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Full Name</label>  
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" required>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="tel" id="address" name="address" required>
            </div>
            <div>
                <label for="letter">Cover Letter</label>
                <textarea name="letter" id="letter" rows="8"></textarea> 
            </div>
            <div>
                <label for="cv">Upload CV</label>
                <input type="file" id="cv" name="cv" required>
            </div>
            <div>
                <button class="button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>