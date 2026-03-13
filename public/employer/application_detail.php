<?php
session_start();
include '../../backend/db.php';
include '../../backend/employer/application_detail.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/applications_detail.css">
</head>
<body>
    <?php include "../navbar.php" ?>
    <div class="container">
        <div>
            <img src="../../icons/back.png" class="back_button" onclick="window.location.href='applications.php?id=<?= $value['job_id'] ?>'">
            <h2>Application</h2>
        </div>  
        
        <div class="info">
            <p>
                <b>Name : </b><?= htmlspecialchars($value['name']) ?>
            </p>
            <p>
                <b>Email : </b><?= htmlspecialchars($value['email']) ?>
            </p>
            <p>
                <b>Contact : </b><?= htmlspecialchars($value['contact']) ?>
            </p>
            <p>
                <b>Address : </b><?= htmlspecialchars($value['address']) ?>
            </p>
        </div>

        <p class="cover_letter">
            <?= htmlspecialchars($value['cover_letter']) ?>
        </p>

        <div>
            <iframe src="../../uploads/files/<?= htmlspecialchars($value['cv_path']) ?>" width="100%" height="600px"></iframe>
        </div>

        <div class="action">
            <?php if($value['status'] === 'Pending') { ?>

                <button onclick="statusChange('Accepted',<?= $id ?>)" class="button">Accept</button>
                <button onclick="statusChange('Rejected',<?= $id ?>)" class="button">Reject</button>

            <?php } else if($value['status'] === 'Accepted') { ?>

                <button onclick="statusChange('Rejected',<?= $id ?>)" class="button">Reject</button>
                <button onclick="statusChange('Pending',<?= $id ?>)" class="button">Pending</button>

            <?php } else if($value['status'] === 'Rejected') { ?>

                <button onclick="statusChange('Accepted',<?= $id ?>)" class="button">Accept</button>
                <button onclick="statusChange('Pending',<?= $id ?>)" class="button">Pending</button>

            <?php } ?>
        </div>
    </div>
    <script>
        function statusChange(action, id){
            window.location.href = "application_detail.php?id="+id+"&action="+action;
        }
    </script>
</body>
</html>