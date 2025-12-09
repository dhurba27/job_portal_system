<?php
include '../../backend/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = trim($_POST['title']);
    $company = trim($_POST['company']);
    $location = trim($_POST['location']);
    $job_type = trim($_POST['job_type']);
    $description = trim($_POST['description']);
    $requirement = trim($_POST['requirement']);
    $salary = trim($_POST['salary']);
    $deadline = $_POST['deadline'];
    $image = trim($_POST['image']);

    $sql = $conn -> prepare(
        'insert into Jobs 
        (job_title, company, location, job_type, job_description, job_requirement, salary, deadline, image, created_by)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $sql -> bind_param("sssssssssi", $title, $company, $location, $job_type, 
    $description, $requirement, $salary, $deadline, $image, $_SESSION["user_id"]);

    if($sql -> execute()){
        $sql -> close();
        header("Location: employer_dashboard.php");
        exit();
    }
}