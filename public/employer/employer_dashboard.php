<?php
// include("../../api/db.php");

// // Ensure employer is logged in
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') {
//     header("Location: ../index.html");
//     exit;
// }

// $employer_id = $_SESSION['user_id'];

// // Fetch jobs posted by this employer
// $jobs_query = $conn->prepare("SELECT * FROM jobs WHERE posted_by=?");
// $jobs_query->bind_param("i", $employer_id);
// $jobs_query->execute();
// $jobs_result = $jobs_query->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employer Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/employer/employer_dashboard.css">
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container">
        <h2>My Applications</h2>

        <div class="title">
            <div>Title</div>
            <div>Company</div>
            <div>Location</div>
            <div>Salary</div>
        </div>

        <?php $i = 1; while ($i < 3) { ?>

            <div class="info">
                <div>title</div>
                <div>company</div>
                <div>location</div>
                <div>salary</div>
            </div>

        <?php $i++;} ?>
    </div>

</body>

</html>