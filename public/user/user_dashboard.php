<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/user_dashboard.css">
</head>

<body>

    <?php include "../navbar.php"; ?>

    <div class="search-container">
        <h1 style="color: white;">Take the next step in <br> your career journey.</h1>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search for jobs" value="">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <div class="jobs_background">
        <div class="container">
            <h3>Popular Jobs</h3>
            <div class="jobs_container">
                <?php for($i = 0; $i < 8; $i++) { ?>
                    <div class="job_card" onclick="window.location.href='job_detail.php'">
                        <div>Full Time</div>
                        <h3>Froent-end Developer</h3>
                        <div>Location</div>
                        <div class="job_card_footer">
                            <div>
                                <img src="../../image/01.jpg" alt="image" class="company_logo" width="50px">
                            </div> 
                            <div>
                                <div>Octuber 10, 2020</div>
                                <div>Creative Studio</div>
                            </div>
                        </div>
                    </div>
               <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>