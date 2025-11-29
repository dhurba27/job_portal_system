<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/user/jobs.css">
</head>
<body>
    <?php include "navbar.php" ?>
    <div class="jobs-hero">
        <div class="container">
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
                <button type="submit">search</button>
            </form>
        </div>
    </div>

    <div class="jobs-container">
        <h3>Popular Jobs</h3>
        
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
    </div>
</body>
</html>