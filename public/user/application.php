<?php 
session_start(); 
include '../../backend/user/application.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Applications - Job Portal</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/applications.css">
</head>

<body>

    <?php include "../navbar.php"; ?>
    <div class="container">
        <h2>Application</h2>
        <div class="table_container">
            
            <?php if(!empty($values)) { ?>
                <div class="title">
                    <div>Job Title</div>
                    <div>Company</div>
                    <div>Location</div>
                    <div>Job Type</div>
                    <div>Employer</div>
                    <div>Status</div>
                </div>
                <div class="info_container">
                    <?php foreach($values as $value){ ?>
                        <div class="info">
                            <div><?= $value['job_title'] ?></div>
                            <div><?= $value['company'] ?></div>
                            <div><?= $value['location'] ?></div>
                            <div><?= $value['job_type'] ?></div>
                            <div>employer</div>
                            <div class="status">
                                Pending
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