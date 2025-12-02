<?php
session_start();
include '../../backend/admin/admin_dashboard.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/applications.css">
</head>

<body>

    <?php include "../navbar.php"; ?>

    <div class="container">
        <h2>Employers</h2>
        <div class="table_container">
            <div class="title">
                <div>Name</div>
                <div>Email</div>
                <div>Action</div>
            </div>
            <div class="info_container">
                <?php foreach($values as $value) { ?>
                    <div class="info">
                        <div><?php echo htmlspecialchars($value['name']); ?></div>
                        <div><?php echo htmlspecialchars($value['email']); ?></div>
                        <div class="action">
                            <a class="edit" href="edit_employer.php?id=<?php echo $value['user_id'] ?>">Edit</a>
                            <a class="delete" href="edit_employer.php?id=<?php echo $value['user_id'] ?>">Delete</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>