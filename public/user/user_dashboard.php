<?php
session_start();
include '../../backend/user/user_dashboard.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/job_card.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/user_dashboard.css">
    <link rel="stylesheet" href="../../css/user/footer.css">
</head>

<body>

    <?php include "../navbar.php" ?>

    <div class="search-container">
        <h1>Take the next step in <br> your career journey.</h1>
        <form method="GET" action="jobs.php">
            <input type="text" name="search" placeholder="Search for jobs" required>
            <button type="submit"><img src="../../icons/search.png" alt="Search"></button>
        </form>
    </div>
    
    <div class="jobs_background">
        <div class="container">

            <h3>Popular Jobs</h3>

            <div class="jobs_container">
                <?php foreach($values as $value){ ?>
                    <div class="job_card" onclick="window.location.href='job_detail.php?id=<?= $value['job_id'] ?>'">

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
               <?php } ?>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php' ?>
</body>

</html>