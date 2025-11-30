<?php
// include("../../api/db.php");

// // Ensure admin is logged in
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
//     header("Location: ../index.html");
//     exit;
// }

// $message = "";

// if (!isset($_GET['id'])) {
//     header("Location: admin-dashboard.php");
//     exit;
// }

// $job_id = intval($_GET['id']);

// // Fetch job details
// $stmt = $conn->prepare("SELECT * FROM jobs WHERE id = ?");
// $stmt->bind_param("i", $job_id);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows == 0) {
//     $message = "<p class='error'> Job not found.</p>";
// } else {
//     $job = $result->fetch_assoc();
// }

// // Update job
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $title = trim($_POST['title']);
//     $company = trim($_POST['company']);
//     $location = trim($_POST['location']);
//     $salary = trim($_POST['salary']);
//     $description = trim($_POST['description']);

//     if ($title && $company && $location && $salary && $description) {
//         $stmt = $conn->prepare("UPDATE jobs SET title=?, company=?, location=?, salary=?, description=? WHERE id=?");
//         $stmt->bind_param("sssssi", $title, $company, $location, $salary, $description, $job_id);
//         if ($stmt->execute()) {
//             $message = "<p class='success'> Job updated successfully.</p>";
//         }
//     }
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Job - Admin</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

    <?php include "../navbar.php" ?>

    <div class="container">

        <h2>Edit Job</h2>

        <form class="label_form" method="POST">
            <div>
                <label for="title">Job Title</label>
                <input type="text" name="title" value="<?php //echo htmlspecialchars($job['title']); ?>" required>
            </div>
            
            <div>
                <label for="company">Company Name</label>
                <input type="text" name="company" value="<?php //echo htmlspecialchars($job['company']); ?>" required>
            </div>
            
            <div>
                <label for="location">Location</label>
                <input type="text" name="location" value="<?php //echo htmlspecialchars($job['location']); ?>" required>
            </div>
            
            <div>
                <label for="salary">Salary</label>
                <input type="text" name="salary" value="<?php //echo htmlspecialchars($job['salary']); ?>" required>
            </div>
            
            <div>
                <label for="description">Job Description</label>
                <textarea name="description" rows="10" required><?php //echo htmlspecialchars($job['description']); ?></textarea>
            </div>

            <button class="button" type="submit">Update Job</button>
        </form>

    </div>

</body>

</html>