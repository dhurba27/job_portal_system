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
    <link rel="stylesheet" href="../../css/job_card.css">
    <link rel="stylesheet" href="../../css/user/applications.css">
</head>

<body>

    <?php include "../navbar.php"; ?>
    <div class="container">

        <h3>Applications</h3>

        <div class="jobs_container">
            <?php foreach($values as $value){ ?>
                <div class="application_job_card" onclick="window.location.href='application_detail.php?id=<?= $value['application_id'] ?>'">
                    <div class="job_detail">
                        <div>
                            <span class="job_type"><?php echo $value['job_type'] ?></span>
                        </div>
        
                        <h3>
                            <?php echo $value['job_title'] ?>
                        </h3>
        
                        <div class="location_container">
                            <img src="../../icons/pin.png" alt="">
                            <?php echo $value['location'] ?>
                        </div> 
        
                        <div class="job_card_footer">
                            <img src="../../image/<?php echo $value['image'] ?>" alt="image" class="company_logo">
                            <div>
                                <div>
                                    <?php echo date("F j, Y", strtotime($value['posted_on'])) ?>
                                </div>
        
                                <div class="company_name">
                                    <?php echo $value['company'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="status">
                        <?= $value['status'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>