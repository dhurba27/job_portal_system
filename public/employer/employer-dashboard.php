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
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f5f7;
        }

        .navbar {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: #0056b3;
            padding: 8px 15px;
            border-radius: 5px;
            margin-left: 10px;
        }

        .navbar a:hover {
            background: #004080;
        }

        .container {
            margin: 30px auto;
            width: 90%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #fff;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }

        th {
            background: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
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