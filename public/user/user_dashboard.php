<?php
session_start();
include '../../backend/user/user_dashboard.php';
include '../../backend/user/user_dashboard_search.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/job_card.css">
    <link rel="stylesheet" href="../../css/user/user_dashboard.css">
</head>

<body>

    <?php include "../navbar.php"; ?>

    <div class="search-container">
        <h1 style="color: white;">Take the next step in <br> your career journey.</h1>
        <form method="GET" action="#jobs_container">
            <input type="text" name="search" placeholder="Search for jobs" value="<?= $value ?? '' ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <div class="jobs_background" id="jobs_container">
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