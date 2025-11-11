<?php
include("../../api/db.php");

// Ensure admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.html");
    exit;
}

$message = "";

if (!isset($_GET['id'])) {
    header("Location: admin-dashboard.php");
    exit;
}

$job_id = intval($_GET['id']);

// Fetch job details
$stmt = $conn->prepare("SELECT * FROM jobs WHERE id = ?");
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $message = "<p class='error'> Job not found.</p>";
} else {
    $job = $result->fetch_assoc();
}

// Update job
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $company = trim($_POST['company']);
    $location = trim($_POST['location']);
    $salary = trim($_POST['salary']);
    $description = trim($_POST['description']);

    if ($title && $company && $location && $salary && $description) {
        $stmt = $conn->prepare("UPDATE jobs SET title=?, company=?, location=?, salary=?, description=? WHERE id=?");
        $stmt->bind_param("sssssi", $title, $company, $location, $salary, $description, $job_id);
        if ($stmt->execute()) {
            $message = "<p class='success'> Job updated successfully.</p>";
        } else {
            $message = "<p class='error'> Failed to update job.</p>";
        }
    } else {
        $message = "<p class='error'> All fields are required.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Job - Admin</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            background: #f4f6f8;
            margin: 0;
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
            padding: 8px 15px;
            border-radius: 5px;
            margin-left: 10px;
            background: #0056b3;
        }

        .navbar a:hover {
            background: #004080;
        }

        .container {
            background: white;
            width: 80%;
            margin: 40px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #FFF;
            margin-top: 0;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success,
        .error {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Edit Job - Admin</h2>
        <div>
            <a href="admin-dashboard.php">Jobs</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="../../api/logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <?php echo $message; ?>

        <?php if (!empty($job)) { ?>
            <form method="POST">
                <label for="title">Job Title</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($job['title']); ?>" required>

                <label for="company">Company Name</label>
                <input type="text" name="company" value="<?php echo htmlspecialchars($job['company']); ?>" required>

                <label for="location">Location</label>
                <input type="text" name="location" value="<?php echo htmlspecialchars($job['location']); ?>" required>

                <label for="salary">Salary</label>
                <input type="text" name="salary" value="<?php echo htmlspecialchars($job['salary']); ?>" required>

                <label for="description">Job Description</label>
                <textarea name="description" required><?php echo htmlspecialchars($job['description']); ?></textarea>

                <button type="submit">Update Job</button>
            </form>
        <?php } ?>
    </div>

</body>

</html>