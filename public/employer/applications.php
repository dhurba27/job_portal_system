<?php
session_start();
include '../../backend/employer/applications.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Applications - Employer Dashboard</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/applications.css">
</head>

<body>

    <?php include '../navbar.php' ?>

    <div class="container">
        <h2>Applications for <?= $job_title ?></h2>
        <div class="table_container">

            <?php if(!empty($values)) { ?>
                <div class="title">
                    <div>Applicant Name</div>
                    <div>Email</div>
                    <div>Contact</div>
                    <div>Address</div>
                    <div>Status</div>
                    <div>Action</div>
                </div>
                <div class="info_container">
                    <?php foreach($values as $value) { ?>
            
                        <div class="info">
                            <div><?= $value['name'] ?></div>
                            <div><?= $value['email'] ?></div>
                            <div><?= $value['contact'] ?></div>
                            <div><?= $value['address'] ?></div>
                            <div>Status</div>
                            <div>
                                view details
                            </div>
                        </div>
            
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div>No application</div>
            <?php } ?>
        </div>
    </div>

</body>

</html>