<?php 
session_start(); 
include '../../backend/employer/employer_dashboard.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/job_card.css">
    <link rel="stylesheet" href="../../css/employer/employer_dashboard.css">
</head>

<body>

    <?php include '../navbar.php' ?>

    <div class="jobs_background">
        <div class="container">
            <h3>Posted Jobs</h3>
            <?php if(!empty($values)) { ?>
                <div class="jobs_container">
                    <?php foreach($values as $value){ ?>
                        <div class="job_card" onclick="window.location.href='job_detail.php?id=<?= $value['job_id'] ?>'">
                            <div class="job_status_info">
                                <div>
                                    <span class="job_type"><?php echo $value['job_type'] ?></span>
                                </div>
                                <div>
                                    <span class="job_status"><?php echo $value['status'] ?></span>
                                </div>
                            </div>
                            <h3><?php echo $value['job_title'] ?></h3>
                            <div class="location_container">
                                <img src="../../icons/pin.png" alt="">
                                <?php echo $value['location'] ?>
                            </div> 
                            <div class="job_card_footer">
                                <img src="../../image/<?php echo $value['image'] ?>" alt="image" class="company_logo">
                                <div>
                                    <div><?php echo date("F j, Y", strtotime($value['posted_on'])) ?></div>
                                    <div class="company_name">
                                        <?php echo $value['company'] ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="action">
                                <a href="edit_job.php?id=<?= $value['job_id'] ?>" class="edit">Edit</a>
                                <a href="dashboard.php?delete_job=<?= $job['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this job?');">Delete</a>
                            </div>
                        </div>
                <?php } ?>
                </div>
            <?php } else { ?>
                <div>No job posted</div>
            <?php } ?>
        </div>
    </div>

</body>

</html>