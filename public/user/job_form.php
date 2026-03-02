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
    <link rel="stylesheet" href="../../css/user/job_form.css">
    <link rel="stylesheet" href="../../css/navbar.css">
</head>
<body>

    <?php include "../navbar.php"; ?>

    <div class="container">
        <h3>Job Form</h3>        
        <form class="label_form" action="" method="post" enctype="multipart/form-data">
            <div>
                <label class="label" for="letter">Cover Letter</label>
                <textarea class="textarea" name="letter" id="letter" rows="8"></textarea> 
            </div>
            <div>
                <label class="label" for="cv">Upload CV (only PDF)</label>
                <input class="input" type="file" id="cv" name="cv" required>
                <div class="error">
                    <?= $_SESSION['cv_error'] ?? '' ?>
                </div>
            </div>
            <div>
                <button class="button" type="submit">Submit</button>
            </div>
            <?php unset($_SESSION['cv_error']) ?>
        </form>
    </div>
</body>
</html>