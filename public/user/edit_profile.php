<?php
session_start();
include '../../backend/db.php';
include '../../backend/user/edit_profile.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/edit_profile.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>
<body>

<?php include '../navbar.php' ?>

<div class="edit_profile_container">

    <div class="profile_image">
        <img src="../../uploads/images/<?= htmlspecialchars($profile['photo'] ?? 'default.jpg') ?>" alt="Profile Photo">
    </div>

    <form method="POST" class="label_form">

        <h1>Edit Profile</h1>

        <div>
            <label class="label" for="bio">Bio</label>
            <textarea class="textarea" name="bio" id="bio" rows="4" required><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="label" for="address">Address</label>
            <input class="input" type="text" name="address" id="address" value="<?= htmlspecialchars($profile['address'] ?? '') ?>" required>
        </div>

        <div>
            <label class="label" for="contact">Contact</label>
            <input class="input" type="tel" name="contact" id="contact" value="<?= htmlspecialchars($profile['contact'] ?? '') ?>" required>
        </div>

        <button type="submit" class="profile_edit_button">
            Save Changes
        </button>

    </form>

</div>

</body>
</html>