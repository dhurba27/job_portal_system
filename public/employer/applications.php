<?php
include("../../api/db.php");

// Ensure employer is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') {
    header("Location: ../index.html");
    exit;
}

$employer_id = $_SESSION['user_id'];

// Handle status update
if (isset($_POST['update_status'])) {
    $app_id = $_POST['app_id'];
    $new_status = $_POST['status'];

    $update = $conn->prepare("UPDATE applications SET status=? WHERE id=?");
    $update->bind_param("si", $new_status, $app_id);
    $update->execute();
    header("location: applications.php");
}

// Fetch applications for this employer's jobs
$app_query = $conn->prepare("
    SELECT a.id AS app_id, a.status, u.name AS applicant_name, j.title, j.company, j.location
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    JOIN users u ON a.user_id = u.id
    WHERE j.posted_by = ?
    ORDER BY a.id DESC
");
$app_query->bind_param("i", $employer_id);
$app_query->execute();
$app_result = $app_query->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Applications - Employer Dashboard</title>
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

        select,
        button {
            padding: 6px 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .status {
            font-weight: bold;
        }

        .Pending {
            color: orange;
        }

        .Accepted {
            color: green;
        }

        .Rejected {
            color: red;
        }

        .msg {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Applications</h2>
        <div>
            <a href="employer-dashboard.php">Home</a>
            <a href="add_job.php">Add Job</a>
            <a href="../../api/logout.php">Logout</a>
        </div>
    </div>

    <?php if (isset($msg)) echo "<p class='msg'>$msg</p>"; ?>

    <div class="container">
        <h2>Applications Received</h2>
        <table>
            <tr>
                <th>Applicant Name</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Status</th>
                <th>Update</th>
            </tr>
            <?php if ($app_result->num_rows > 0) { ?>
                <?php while ($app = $app_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($app['applicant_name']); ?></td>
                        <td><?php echo htmlspecialchars($app['title']); ?></td>
                        <td><?php echo htmlspecialchars($app['company']); ?></td>
                        <td><?php echo htmlspecialchars($app['location']); ?></td>
                        <td class="status <?php echo htmlspecialchars($app['status']); ?>">
                            <?php echo htmlspecialchars($app['status']); ?>
                        </td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="app_id" value="<?php echo $app['app_id']; ?>">
                                <select name="status">
                                    <option value="Pending" <?php if ($app['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                    <option value="Accepted" <?php if ($app['status'] == 'Accepted') echo 'selected'; ?>>Accepted</option>
                                    <option value="Rejected" <?php if ($app['status'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
                                </select>
                                <button type="submit" name="update_status">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6">No applications received yet.</td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>