<?php
session_start();
include '../../backend/db.php';
include '../../backend/user/profile.php';
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
            <img src="../../uploads/images/<?= htmlspecialchars($value['photo'] ?? 'default.jpg') ?>" alt="Profile Photo">

            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="photo" id="photoInput" hidden>
                <button type="button" class="change_photo_button" id="changePhotoBtn">
                    Change Photo
                </button>
                <input type="submit" name="photo_submit" hidden id="photoSubmit">
            </form>

        </div>
        <div class="profile_info">
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 'incomplete'){
            ?>
                <h3 class="error">Profile must be complete to apply for job.</h3> 
            <?php } ?>

            <div class="basic_info">
                <div>
                    <h1><?= htmlspecialchars($value['name']) ?></h1>
                </div>
                <div>
                    <p class="bio">
                        <?= htmlspecialchars($value['bio'] ?? 'No bio added yet.') ?>
                    </p>
                </div>
                <div class="info">
                    <h4><img src="../../icons/email.png" alt="" class="icon"><?= htmlspecialchars($value['email']) ?></h4>
                    <h4><img src="../../icons/pin.png" alt="" class="icon"><?= htmlspecialchars($value['address'] ?? 'Not provided') ?></h4>
                    <h4><img src="../../icons/phone.png" alt="" class="icon"><?= htmlspecialchars($value['contact'] ?? 'Not provided') ?></h4>
                </div>
            </div>
            <a href="edit_profile.php" class="profile_edit_button">Edit Profile</a>
        </div>
    </div>
    <script src="../../js/change_photo.js"></script>
</body>
</html>