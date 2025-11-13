<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/user/user_dashboard.css">
</head>

<body>

    <?php include "navbar.html"; ?>

    <div class="search-container">
        <h1 style="color: white;">Ready to explore</h1>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search for jobs..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="jobs-container">
        <h3>Popular Jobs</h3>
        <!-- <?php while (1) { ?> -->
            <div class="job-card" onclick="window.location.href='job_detail.php'">
                <div style="display: flex; gap: 15px;">
                    <div>
                        <img src="" alt="image" class="company_logo">
                    </div>
                    <div>
                        <div>job title</div>
                        <div>company name</div>
                    </div>
                </div>
                <div style="text-align: end;">
                    <div>full time</div>
                    <div>Posted 1 hour ago</div>
                    <div><b>Closes:</b> Octuber 10, 2020</div>
                </div>
            </div>
        <!-- <?php } ?> -->
    </div>

</body>

</html>