<?php include '../../backend/admin/edit_user.php' ?> 

<!DOCTYPE html>
<html>

<head>
    <title>Edit User - Admin</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="container">
        
        <h2>Edit User</h2>

        <form class="label_form" id="form" action="" method="POST">

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name_value) ?>" required>
                <div class="error" id="nameError"></div>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email_value) ?>" required>
                <div class="error" id="emailError">
                    <?= $_SESSION['email_error'] ?? ''; ?>
                </div>
            </div>

            <div>
                <label for="role">User Type</label>
                <div class="select-div">
                    <select name="role" id="role" required>
    
                        <option value="user" <?= $role_value == 'user' ? 'selected' : '' ?>>
                            User
                        </option>
    
                        <option value="employer" <?= $role_value == 'employer' ? 'selected' : '' ?>>
                            Employer
                        </option>
    
                        <option value="admin" <?= $role_value == 'admin' ? 'selected' : '' ?>>
                            Admin
                        </option>
                    </select>
                </div>
                <div class="error" id="selectError"></div>
            </div>

            <div>
                <button type="submit">Update User</button>
            </div>

            <?php
                unset($_SESSION['email_error']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['role']);
            ?>

        </form>
    </div>

    <script src="../../js/form.js"></script>

</body>

</html>