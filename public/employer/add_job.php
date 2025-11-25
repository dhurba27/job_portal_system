<!DOCTYPE html>
<html>

<head>
    <title>Add Job - Employer</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/employer/add_job.css">
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
        <form method="POST">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" required>

            <label for="company">Company Name</label>
            <input type="text" name="company" id="company" required>

            <label for="location">Location</label>
            <input type="text" name="location" id="location" required>

            <label for="job_type">Job Type</label>
            <select name="job_type" id="job_type">
                <option value="Full-Time">Full Time</option>
                <option value="Part-Time">Part Time</option>
            </select>

            <label for="experience">Experience</label>
            <input type="text" name="experience" id="experience" required>

            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" required>

            <label for="description">Job Description</label>
            <textarea name="description" id="description" required></textarea>

            <label for="requirement">Requirement</label>
            <textarea name="requirement" id="requirement" required></textarea>

            <label for="deadlin">Deadline</label>
            <input type="text" name="deadline" id="deadline" required>

            <button type="submit">Add Job</button>
        </form>
    </div>

</body>

</html>