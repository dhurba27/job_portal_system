<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Job - Employer</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

    <?php include '../navbar.php' ?>

    <div class="container">
        <h2>Add New Job</h2>
        <form class="label_form" method="POST">
            <div>
                <label for="title">Job Title</label>
                <input type="text" name="title" id="title" required>
            </div>
            
            <div>
                <label for="company">Company Name</label>
                <input type="text" name="company" id="company" required>
            </div>
            
            <div>
                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>
            </div>
            
            <div>
                <label for="job_type">Job Type</label>
                <div  class="select-div">
                    <select name="job_type" id="job_type">
                        <option value="Full-Time">Full Time</option>
                        <option value="Part-Time">Part Time</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label for="experience">Experience</label>
                <input type="text" name="experience" id="experience" required>
            </div>
            
            <div>
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" required>
            </div>
            
            <div>
                <label for="description">Job Description</label>
                <textarea name="description" id="description" rows="15" required></textarea>
            </div>
            
            <div>
                <label for="requirement">Requirement</label>
                <textarea name="requirement" id="requirement" rows="15" required></textarea>
            </div>
            
            <div>
                <label for="deadlin">Deadline</label>
                <input type="date" name="deadline" id="deadline" required>
            </div>

            <button class="button" type="submit">Add Job</button>
        </form>
    </div>

</body>

</html>