<?php
include '../../backend/db.php';
$id = $_GET['id'];

$sql = $conn ->prepare('select * from jobs where job_id = ?');
$sql -> bind_param('i', $id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql -> close();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $company = trim($_POST['company']);
    $location = trim($_POST['location']);
    $job_type = trim($_POST['job_type']);
    $description = trim($_POST['description']);
    $requirement = trim($_POST['requirement']);
    $salary = trim($_POST['salary']);
    $deadline = $_POST['deadline'];
    $newName = $value['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $uploadDir = "../../uploads/images/";
        $newName = time() . "_" . $file['name'];
        $destination = $uploadDir . $newName;
        move_uploaded_file($file['tmp_name'], $destination);
    } 

    $sql = $conn -> prepare(
        'update Jobs set
        job_title = ?, company = ?, location = ?, job_type = ?, job_description = ?, 
        job_requirement = ?, salary = ?, deadline = ?, image = ? where job_id = ?');
    $sql -> bind_param("sssssssssi", $title, $company, $location, $job_type, 
    $description, $requirement, $salary, $deadline, $newName, $id);

    if($sql -> execute()){
        $sql -> close();
        header("Location: job_detail.php?id=$id");
        exit();
    }
}
