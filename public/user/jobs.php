<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/jobs.css">
</head>
<body>
    <?php include "../navbar.php" ?>
    <div class="jobs-hero">
        <div class="search_container">
            <h1>Find a role that matches your ambition</h1>
            <p>Search thousands of curated openings across industries, experience levels, and locations.</p>
            <form action="">
                <input type="text" placeholder="job title">
                <div class="select-div">
                    <select name="" id="">
                        <option value="">location</option>
                        <option value="">jamal</option>
                        <option value="">jamal</option>
                        <option value="">jamal</option>
                    </select>
                </div>
                <div class="select-div">
                    <select name="" id="">
                        <option value="">catagory</option>
                        <option value="">jamal</option>
                        <option value="">jamal</option>
                        <option value="">jamal</option>
                    </select>
                </div>
                <button class="search_button" type="submit">search</button>
            </form>
        </div>
    </div>

    <div class="jobs_background">
        <div class="container">
            <h3>Jobs Found</h3>
            <div class="jobs_container">
                <?php for($i = 0; $i < 6; $i++) { ?>
                    <div class="job_card" onclick="window.location.href='job_detail.php'">
                        <div>
                            <div>
                                <img src="" alt="image" class="company_logo">
                            </div>
                            <div>
                                <h3>Froent-end Developer</h3>
                                <div>Creative Studio</div>
                            </div>
                        </div>
                        <div>
                            <div>full time</div>
                            <div>Posted 1 hour ago</div>
                            <div><b>Closes:</b> Octuber 10, 2020</div>
                        </div>
                    </div>
               <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>