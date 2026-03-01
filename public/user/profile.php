<?php
session_start();
include '../../backend/db.php';

$user_id = $_SESSION['user_id'];
$sql = $conn -> prepare("select * from users left join profiles on profiles.user_id = users.user_id where users.user_id = ?");
$sql->bind_param("i", $user_id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result->fetch_assoc();
$sql->close();

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
            <a class="change_photo_button">Change Photo</a>
        </div>
        <div class="profile_info">
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
</body>
</html>