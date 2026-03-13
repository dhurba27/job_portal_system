<?php
session_start();
include '../../backend/admin/edit_employer.php'; 
?> 

<!DOCTYPE html>
<html>

<head>
    <title>Edit Employers</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/icon.css">
    <link rel="stylesheet" href="../../css/admin/edit_employer.css">
</head>

<body>

    <?php include "../navbar.php"; ?>

    <div class="container">
        
        <h2>Edit Employer</h2>

        <form class="label_form" id="form" action="" method="POST">

            <div>
                <label class="label" for="name">Name</label>
                <input class="input" type="text" id="name" name="name" value="<?= htmlspecialchars($name_value) ?>" required>
                <div class="error" id="nameError"></div>
            </div>

            <div>
                <label class="label" for="email">Email</label>
                <input class="input" type="email" id="email" name="email" value="<?= htmlspecialchars($email_value) ?>" required>
                <div class="error" id="emailError">
                    <?= $_SESSION['email_error'] ?? ''; ?>
                </div>
            </div>

            <div>
                <label class="input_container">
                    <img src="../../icons/padlock.png" alt="">
                    <input type="password" id="password" name="password" placeholder="New Password">
                    <img src="../../icons/invisible.png" alt="image" id="invisible_icon">
                </label>

                <div class="error" id="passwordError"></div>
            </div>  

            <div>
                <button class="button" type="submit">Submit</button>
            </div>

            <?php
                unset($_SESSION['email_error']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
            ?>

        </form>
    </div>

    <script src="../../js/form.js"></script>
    <script src="../../js/password.js"></script>

</body>

</html>