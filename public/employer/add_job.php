<?php
include("../../api/db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') {
    header("Location: ../index.html");
    exit;
}

$employer_id = $_SESSION['user_id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $company = trim($_POST['company']);
    $location = trim($_POST['location']);
    $salary = trim($_POST['salary']);
    $description = trim($_POST['description']);

    if ($title && $company && $location && $salary && $description) {
        $sql = "INSERT INTO jobs (title, company, location, salary, description, posted_by)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $title, $company, $location, $salary, $description, $employer_id);
        if ($stmt->execute()) {
            header("location: employer-dashboard.php");
        } else {
            $message = "<p class='error'> Failed to add job. Please try again.</p>";
        }
    } else {
        $message = "<p class='error'> All fields are required.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Job - Employer</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/employer/add_job.css">
</head>

<body>

    <div class="navbar">
        <h2>Job Portal - Add Job</h2>
        <div>
            <a href="employer-dashboard.php">Home</a>
            <a href="applications.php">Applications</a>
            <a href="../../api/logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Add New Job</h2>
        <?php echo $message; ?>
        <form method="POST">
            <label for="title">Job Title</label>
            <input type="text" name="title" required>

            <label for="company">Company Name</label>
            <input type="text" name="company" required>

            <label for="location">Location</label>
            <input type="text" name="location" required>

            <label for="salary">Salary</label>
            <input type="text" name="salary" required>

            <label for="description">Job Description</label>
            <textarea name="description" required></textarea>

            <button type="submit">Add Job</button>
        </form>
    </div>

</body>

</html>