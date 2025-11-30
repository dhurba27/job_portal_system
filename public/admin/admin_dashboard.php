<?php
// include "../../backend/db.php";

// // Ensure admin is logged in
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
//     header("Location: ../index.html");
//     exit;
// }

// $message = "";

// // Delete job
// if (isset($_GET['delete_job'])) {
//     $job_id = intval($_GET['delete_job']);
//     $stmt = $conn->prepare("DELETE FROM jobs WHERE id = ?");
//     $stmt->bind_param("i", $job_id);
//     if ($stmt->execute()) {
//         $message = "<p class='success'> Job deleted successfully.</p>";
//     } else {
//         $message = "<p class='error'> Failed to delete job.</p>";
//     }
// }

// // Fetch all jobs
// $jobs_stmt = $conn->prepare("SELECT jobs.*, users.name AS employer_name FROM jobs JOIN users ON jobs.posted_by = users.id ORDER BY jobs.id DESC");
// $jobs_stmt->execute();
// $jobs_result = $jobs_stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/admin/admin_dashboard.css">
    <style>
        .btn {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

    </style>
</head>

<body>

    <?php include '../navbar.php' ?>

    <div class="container">
        <h2>Jobs</h2>

        <div class="title">
            <div>Job Title</div>
            <div>Company</div>
            <div>Location</div>
            <div>Salary</div>
            <div>Description</div>
            <div>Posted By</div>
            <div>Action</div>
        </div>

        <?php $i = 1; while ($i < 3) { ?>

            <div class="info">
                <div>title</div>
                <div>company</div>
                <div>location</div>
                <div>salary</div>
                <div>description</div>
                <div>employer</div>
                <div>
                    <a href="edit_job.php?id=<?php echo $job['id']; ?>" class="btn edit-btn">Edit</a>
                    <a href="dashboard.php?delete_job=<?php echo $job['id']; ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this job?');">Delete</a>
                </div>
            </div>

        <?php $i++;} ?>
    </div>

</body>

</html>