<?php
include("../../api/db.php");

// Redirect if not logged in or not a normal user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.html");
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle search
$search = isset($_GET['search']) ? $_GET['search'] : "";

// Handle job application
if (isset($_POST['apply'])) {
    $job_id = $_POST['job_id'];
    // Check if already applied
    $check = $conn->prepare("SELECT * FROM applications WHERE job_id=? AND user_id=?");
    $check->bind_param("ii", $job_id, $user_id);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        $msg = "You have already applied for this job.";
    } else {
        $apply = $conn->prepare("INSERT INTO applications (job_id, user_id, status) VALUES (?, ?, 'Pending')");
        $apply->bind_param("ii", $job_id, $user_id);
        $apply->execute();
        header("location: my_applications.php");
    }
}

// Fetch available jobs (filtered by search)
$query = "SELECT * FROM jobs";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard - Job Portal</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f5f7;
        }        

        /* Search bar */
        .search-container {
            background-image: url("../../image/image1.jpg");
            background-size: cover;
            background-position: bottom;
            height: 500px;
            display: flex;
            flex-direction: column;
            gap: 50px;
            justify-content: center;
            align-items: center;
        }

        .search-container input[type="text"] {
            padding: 10px;
            width: 500px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .search-container button {
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background: #0056b3;
        }

        /* Job Cards */
        .jobs-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 50px 0;
        }


        .job-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            width: 80%;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            line-height: 25px;
        }

        .job-card:hover {
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
            transition: 400ms;
        }
    </style>
</head>

<body>

    <?php include "navbar.html"; ?>

    <?php if (isset($msg)) echo "<p class='msg'>$msg</p>"; ?>

    <div class="search-container">
        <h1 style="color: white;">Ready to explore</h1>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search for jobs..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="jobs-container">
        <h3>Popular Jobs</h3>
        <?php while ($job = $result->fetch_assoc()) { ?>
            <div class="job-card" onclick="window.location.href='job_detail.php'">
                <div style="display: flex; gap: 15px;">
                    <div>
                        <img src="" alt="image" class="company_logo">
                    </div>
                    <div>
                        <div><?php echo htmlspecialchars($job['title']); ?></div>
                        <div><?php echo htmlspecialchars($job['company']); ?></div>
                    </div>
                </div>
                <div style="text-align: end;">
                    <div>full time</div>
                    <div>Posted 1 hour ago</div>
                    <div><b>Closes:</b> Octuber 10, 2020</div>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>