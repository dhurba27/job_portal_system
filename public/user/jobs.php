<?php 
session_start(); 
include '../../backend/user/jobs.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/job_card.css">
    <link rel="stylesheet" href="../../css/user/jobs.css">
</head>
<body>
    <?php include "../navbar.php" ?>
    <div class="jobs-hero">
        <div class="search_container">
            <h1>Find a role that matches your ambition</h1>
            <form action="">
                <input type="text" placeholder="job title">
                <div class="select-div">
                    <select name="" id="">
                        <option value="">Location</option>
                        <option value="">kathmandu</option>
                        <option value="">Banasthali</option>
                        <option value="">Jamal</option>
                    </select>
                </div>
                <div class="select-div">
                    <select name="" id="">
                        <option value="">Catagory</option>
                        <option value="">Full Time</option>
                        <option value="">Part Time</option>
                        <option value="">Internship</option>
                    </select>
                </div>
                <button class="search_button" type="submit">search</button>
            </form>
        </div>
    </div>

    <div class="jobs_background">
        <div class="container">
            <h3>Popular Jobs</h3>
            <div class="jobs_container">
                <?php foreach($values as $value){ ?>
                    <div class="job_card" onclick="window.location.href='job_detail.php?id=<?= $value['job_id'] ?>'">
                        <div><?php echo $value['job_type'] ?></div>
                        <h3><?php echo $value['job_title'] ?></h3>
                        <div><?php echo $value['location'] ?></div> 
                        <div class="job_card_footer">
                            <img src="../../image/<?php echo $value['image'] ?>" alt="image" class="company_logo">
                            <div>
                                <div><?php echo date("F j, Y", strtotime($value['posted_on'])) ?></div>
                                <div><?php echo $value['company'] ?></div>
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