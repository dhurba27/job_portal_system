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
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
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
            background: #003f8a;
        }

        .container {
            background: white;
            width: 60%;
            margin: 40px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #FFF;
        }

        .container h2 {
            text-align: center;
            color: #007BFF;
        }

        form {
            width: 80%;
            margin: auto;
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
            resize: none;
            height: 100px;
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