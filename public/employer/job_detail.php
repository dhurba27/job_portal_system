<?php 
session_start(); 
include '../../backend/employer/job_detail.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/job_detail.css">
</head>
<body>

    <?php include "../navbar.php"; ?>

    <div class="container">
        <h3><?= $value['job_title'] ?></h3>
        <div class="job_info">
            <div><?= $value['job_type'] ?></div>
            <div><?= $value['location'] ?></div>
            <div>Posted: <?= date("F j, Y", strtotime($value['posted_on'])) ?></div>
            <div><b>Closes:</b> <?= date("F j, Y", strtotime($value['deadline'])) ?></div>
        </div>
        <div>
            <?= $value['job_description'] ?>
        </div>
        <div>
            <?= $value['job_requirement'] ?>
        </div>
        <div>
            <button class="button" 
            onclick="window.location.href = 'applications.php?id=<?= $id ?>&job=<?= $value['job_title'] ?>'">
                View Applications
            </button>
        </div>
    </div>
</body>
</html>