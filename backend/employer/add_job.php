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
    $newName = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $uploadDir = "../../uploads/images/";
        $newName = time() . "_" . $file['name'];
        $destination = $uploadDir . $newName;
        move_uploaded_file($file['tmp_name'], $destination);
    } 

    $sql = $conn -> prepare(
        'insert into Jobs 
        (job_title, company, location, job_type, job_description, job_requirement, salary, deadline, image, created_by)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $sql -> bind_param("sssssssssi", $title, $company, $location, $job_type, 
    $description, $requirement, $salary, $deadline, $newName, $_SESSION["user_id"]);

    if($sql -> execute()){
        $job_id = $conn->insert_id;
        $sql -> close();
        header("Location: job_detail.php?id=$job_id");
        exit();
    }
}