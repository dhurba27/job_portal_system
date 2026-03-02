<?php
session_start();
include '../../backend/db.php';
include '../../backend/user/account_setting.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/account_setting.css">
    <link rel="stylesheet" href="../../css/icon.css">
</head>
<body>
    <?php include '../navbar.php' ?>

    <div class="account_setting_container">
        <div class="profile_image">
            <img src="../../uploads/images/<?= htmlspecialchars($value['photo'] ?? 'default.jpg') ?>" alt="Profile Photo">
        </div>

        <div class="basic_info">

            <div class="profile_section">
                <div class="info">
                    <h3><img src="../../icons/user.png" alt="" class="icon"><?= htmlspecialchars($value['name']) ?></h3>
                    <button class="button change_button">Change Name</button>
                </div>

                <div class="edit_info">
                    <form class="edit_name_form" method="post">
                        <div class="input_div">
                            <label class="input_container">
                                <img src="../../icons/user.png" alt="">
                                <input type="text" id="name" name="name" value="<?= htmlspecialchars($value['name']) ?>" required>
                            </label>

                            <div class="error" id="nameError"></div>
                        </div>
    
                        <input class="button" type="submit" name="name_submit" value="Save">
                    </form>
                </div>
            </div>
            
            <div class="profile_section">
                <div class="info">
                    <h3><img src="../../icons/email.png" alt="" class="icon"><?= htmlspecialchars($value['email']) ?></h3>
                    <button class="button change_button">Change Email</button>
                </div>

                <div class="edit_info">
                    <form class="edit_email_form" method="post">
                        <div class="input_div">
                            <label class="input_container">
                                <img src="../../icons/email.png" alt="">
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($value['email']) ?>" required>
                            </label>

                            <div class="error" id="emailError"></div>
                        </div>
    
                        <input class="button" type="submit" name="email_submit" value="Save">
                    </form>
                </div>
            </div>

            <div class="profile_section">
                <div class="info">
                    <h3><img src="../../icons/padlock.png" alt="" class="icon">************</h3>
                    <button class="change_button button">Change Password</button>
                </div>

                <div class="edit_info">
                    <form class="edit_password_form" method="post">
                        <div class="input_div">
                            <label class="input_container">
                                <img src="../../icons/padlock.png" alt="">
                                <input type="password" id="password" name="password" placeholder="New Password" required>   
                                <img src="../../icons/invisible.png" alt="image" id="invisible_icon">
                            </label>

                            <div class="error" id="passwordError"></div>
                        </div>
    
                        <input class="button" type="submit" name="password_submit" value="Save">
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="../../js/account_setting.js"></script>
    <script src="../../js/password.js"></script>
</body>
</html>