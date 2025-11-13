<?php
include("../../api/db.php");

// Check login & role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.html");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user's applications
$sql = "
    SELECT a.*, j.title, j.company, j.location, j.salary, u.name AS employer_name
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    JOIN users u ON j.posted_by = u.id
    WHERE a.user_id = ?
    ORDER BY a.id DESC
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Applications - Job Portal</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/user/applications.css">
</head>

<body>

    <?php include "navbar.html"; ?>

    <div class="container">
        <h2>My Applications</h2>

        <div class="title">
            <div>Job Title</div>
            <div>Company</div>
            <div>Location</div>
            <div>Salary</div>
            <div>Employer</div>
            <div>Status</div>
        </div>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="info">
                <div><?php echo htmlspecialchars($row['title']); ?></div>
                <div><?php echo htmlspecialchars($row['company']); ?></div>
                <div><?php echo htmlspecialchars($row['location']); ?></div>
                <div><?php echo htmlspecialchars($row['salary']); ?></div>
                <div><?php echo htmlspecialchars($row['employer_name']); ?></div>
                <div class="status <?php echo htmlspecialchars($row['status']); ?>">
                    <?php echo htmlspecialchars($row['status']); ?>
                </div>
            </div>

        <?php } ?>
    </div>

</body>

</html>