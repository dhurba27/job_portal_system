<?php 
session_start(); 
include '../../backend/employer/add_job.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Job</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/employer/add_job.css">
</head>

<body>

    <?php include '../navbar.php' ?>

    <div class="container">
        <h2>Add New Job</h2>
        <form class="label_form" method="POST" enctype="multipart/form-data">
            <div>
                <label class="label" for="title">Job Title</label>
                <input class="input" type="text" name="title" id="title" required>
            </div>
            
            <div>
                <label class="label" for="company">Company Name</label>
                <input class="input" type="text" name="company" id="company" required>
            </div>
            
            <div>
                <label class="label" for="location">Location</label>
                <input class="input" type="text" name="location" id="location" required>
            </div>
            
            <div>
                <label class="label" for="job_type">Job Type</label>
                <div  class="select-div">
                    <select name="job_type" id="job_type" required>
                        <option value="" disabled selected>Select Job Type</option>
                        <option value="Full-Time">Full Time</option>
                        <option value="Part-Time">Part Time</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="label" for="description">Job Description</label>
                <textarea class="textarea" name="description" id="description" rows="15" required></textarea>
            </div>
            
            <div>
                <label class="label" for="requirement">Requirement</label>
                <textarea class="textarea" name="requirement" id="requirement" rows="15" required></textarea>
            </div>
            
            <div>
                <label class="label" for="salary">Salary</label>
                <input class="input" type="text" name="salary" id="salary">
            </div>

            <div>
                <label class="label" for="deadlin">Deadline</label>
                <input class="input" type="date" name="deadline" id="deadline" min="<?= date('Y-m-d'); ?>" required>
            </div>

            <div>
                <label class="label" for="image">Logo</label>
                <input class="input" type="file" name="image" id="image">
            </div>

            <button class="button" type="submit">Add Job</button>
        </form>
    </div>

</body>

</html>