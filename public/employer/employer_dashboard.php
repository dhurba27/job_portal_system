<?php
include("../../api/db.php");

// Ensure employer is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') {
    header("Location: ../index.html");
    exit;
}

$employer_id = $_SESSION['user_id'];

// Fetch jobs posted by this employer
$jobs_query = $conn->prepare("SELECT * FROM jobs WHERE posted_by=?");
$jobs_query->bind_param("i", $employer_id);
$jobs_query->execute();
$jobs_result = $jobs_query->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employer Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/employer/employer_dashboard.css">
</head>

<body>

    <div class="navbar">
        <h2>Employer Dashboard</h2>
        <div>
            <a href="employer-dashboard.php">Home</a>
            <a href="add_job.php">Add Job</a>
            <a href="applications.php">Applications</a>
            <a href="../../api/logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Jobs You Posted</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Salary</th>
            </tr>
            <?php if ($jobs_result->num_rows > 0) { ?>
                <?php while ($job = $jobs_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($job['title']); ?></td>
                        <td><?php echo htmlspecialchars($job['company']); ?></td>
                        <td><?php echo htmlspecialchars($job['location']); ?></td>
                        <td><?php echo htmlspecialchars($job['salary']); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4">You haven't posted any jobs yet.</td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>