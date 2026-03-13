<?php
session_start();
include '../../backend/employer/applications.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Applications</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/employer/applications.css">
</head>

<body>

    <?php include '../navbar.php' ?>

    <div class="container">
        <h2>Applications</h2>

        <?php if (!empty($values)) { ?>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($values as $value) { ?>
                        <tr>
                            <td><?= htmlspecialchars($value['name']) ?></td>
                            <td><?= htmlspecialchars($value['email']) ?></td>
                            <td><?= htmlspecialchars($value['contact']) ?></td>
                            <td><?= htmlspecialchars($value['address']) ?></td>
                            <td class="<?= $value['status'] ?>"><?= htmlspecialchars($value['status']) ?></td>
                            <td><a class="view_detail" href="application_detail.php?id=<?= $value['application_id'] ?>&job_id=<?= $id ?>">View Details</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <p>No applications found.</p>
        <?php } ?>
    </div>

</body>

</html>