<?php
include("../../backend_php/db.php");
$sql = "select * from users";
$result = mysqli_query($conn, $sql);
$values = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/applications.css">
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="container">

        <h2>All Users</h2>
            <div class="title">
                <div>Name</div>
                <div>Email</div>
                <div>Role</div>
                <div>Action</div>
            </div>
            <?php foreach($values as $value) { ?>
                <div class="info">
                    <div><?php echo htmlspecialchars($value['name']); ?></div>
                    <div><?php echo htmlspecialchars($value['email']); ?></div>
                    <div><?php echo htmlspecialchars($value['role']); ?></div>
                    <a href="edit_user.php?id=<?php echo $value['user_id'] ?>">Edit</a>
                </div>
            <?php } ?>
    </div>

</body>

</html>