<?php 
session_start(); 
include '../../backend/user/jobs.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Search</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/job_card.css">
    <link rel="stylesheet" href="../../css/user/jobs.css">
    <link rel="stylesheet" href="../../css/user/footer.css">
</head>
<body>
    <?php include "../navbar.php" ?>

    <div class="jobs-hero">
        <div class="search_container">

            <h1>Find a role that matches your ambition</h1>

            <form action="" method="GET">
                <input type="text" name="search" placeholder="job title" value="<?= $search ?>">
    
                <input type="text" name="location" placeholder="location" value="<?= $location ?>">

                <div class="select-div">
                    <select name="job_type">
                        <option value="">Category</option>
                        <option value="Full-Time" <?= $category == 'Full-Time' ? 'selected' : '' ?>>
                            Full Time
                        </option>
                        <option value="Part-Time" <?= $category == 'Part-Time' ? 'selected' : '' ?>>
                            Part Time
                        </option>
                    </select>
                </div>

                <button class="search_button" type="submit">search</button>
            </form>
        </div>
    </div>

    <div class="jobs_background">
        <div class="container">

            <h3>Jobs</h3>

            <div class="jobs_container">

                <?php foreach($values as $value){ ?>

                    <div class="job_card" onclick="window.location.href='job_detail.php?id=<?= $value['job_id'] ?>'">

                        <div>
                            <span class="job_type"><?php echo $value['job_type'] ?></span>
                        </div>

                        <h3><?php echo $value['job_title'] ?></h3>

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