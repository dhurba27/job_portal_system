<?php 
session_start(); 
include '../../backend/employer/job_detail.php';
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
                <div class="job_status_info">
                    <h3><?= htmlspecialchars($value['job_title']) ?></h3>
                    <div>
                        <span class="job_type"><?= htmlspecialchars($value['job_type']) ?></span>
                    </div>
                </div>
                <div class="job_info">
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
        
        <div class="button_section">
            
            <?php if($value['status'] === 'Active') { ?>
            
                <button class="button" 
                onclick="window.location.href = 'applications.php?id=<?= $id ?>'">
                    View Applications
                </button>
                <button onclick="statusChange('Suspended',<?= $id ?>)" class="button suspend">Suspend</button>
                <button onclick="statusChange('Closed',<?= $id ?>)" class="button close">Close</button>

            <?php } else if($value['status'] === 'Suspended') { ?>

                <button class="button" 
                onclick="window.location.href = 'applications.php?id=<?= $id ?>'">
                    View Applications
                </button>
                <button onclick="statusChange('Active',<?= $id ?>)" class="button activate">Activate</button>
                <button onclick="statusChange('Closed',<?= $id ?>)" class="button close">Close</button>

            <?php } else if($value['status'] === 'Draft') { ?>

                <button onclick="statusChange('Active',<?= $id ?>)" class="button activate">Activate</button>
                <button onclick="window.location.href = 'job_detail.php?id=<?= $id ?>&action=delete'" class="button delete">Delete</button>

            <?php } else { ?>

                <button class="button" 
                onclick="window.location.href = 'applications.php?id=<?= $id ?>'">
                    View Applications
                </button>
                
            <?php } ?>
            
        </div>
    </div>
    <script>
        function statusChange(action, id){
            window.location.href = "job_detail.php?id="+id+"&action="+action;
        }
    </script>
</body>
</html>