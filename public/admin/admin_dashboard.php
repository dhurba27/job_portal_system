<?php
session_start();
include '../../backend/admin/admin_dashboard.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Employers</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/admin/admin_dashboard.css">
</head>

<body>

    <?php include "../navbar.php"; ?>

    <div class="container">
        <h2>Employers</h2>

        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($values as $value) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($value['name']); ?></td>
                            <td><?php echo htmlspecialchars($value['email']); ?></td>
                            <td class="action">
                                <a class="edit" href="edit_employer.php?id=<?php echo $value['user_id'] ?>">Edit</a>
                                <a class="delete" href="delete_employer.php?id=<?php echo $value['user_id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>