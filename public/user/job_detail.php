<?php 
session_start(); 
include '../../backend/user/job_detail.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Detail</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/job_detail.css">
</head>
<body>

    <?php include "../navbar.php"; ?>

    <div class="container">

        <div class="job_detail_container">
            <img src="../../uploads/images/<?= $value['image'] ?>" alt="image" class="company_logo">
            <div class="job_detail">
                <h3><?= htmlspecialchars($value['job_title']) ?></h3>
                <div class="job_info">
                    <div>
                        <span class="job_type"><?= htmlspecialchars($value['job_type']) ?></span>
                    </div>
                    <div>
                        <img src="../../icons/pin.png" alt="" class="location_icon">
                        <?= htmlspecialchars($value['location']) ?>
                    </div>
                    <div>
                        <b>Posted:</b> <?= date("F j, Y", strtotime($value['posted_on'])) ?>
                    </div>
                    <div>
                        <b>Closes:</b> <?= date("F j, Y", strtotime($value['deadline'])) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="job_section">
            <h4>Job Description</h4>
            <p class="job_text">
                <?= nl2br(htmlspecialchars($value['job_description'])) ?>
            </p>
        </div>

        <div class="job_section">
            <h4>Job Requirements</h4>
            <p class="job_text">
                <?= nl2br(htmlspecialchars($value['job_requirement'])) ?>
            </p>
        </div>

        <div>
            <b>Salary:</b> <?= htmlspecialchars($value['salary']) ?>
        </div>
        
        <div>
            <button class="button" onclick="window.location.href = 'job_form.php?id=<?= $id ?>'">Apply for job</button>
        </div>
    </div>
</body>
</html>