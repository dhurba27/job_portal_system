<?php
include '../../backend/db.php';

if(!isset($_SESSION['user_role'])){
    header("Location: ../verification/login.php");
    exit();
}

$applied_by = $_SESSION['user_id'];

$sql = $conn->prepare("select name, email, bio, address, contact from users join profiles on users.user_id = profiles.user_id where users.user_id = ?");
$sql->bind_param("i", $applied_by);
$sql->execute();
$result = $sql->get_result();
$profile = $result->fetch_assoc();
$sql->close();

if(!$profile){
    header("Location: profile.php?error=incomplete");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_GET['id'];
    $name = $profile['name'];
    $email = $profile['email'];
    $contact = $profile['contact'];
    $address = $profile['address'];
    $cover_letter = trim($_POST['letter']);

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {

        $fileType = mime_content_type($_FILES['cv']['tmp_name']);

        if ($fileType !== 'application/pdf') {
            $_SESSION['cv_error'] = "Only PDF files allowed.";
            header("location: job_form.php");
            exit();
        }

        $file_name = $_FILES['cv']['name'];
        $tmp_name  = $_FILES['cv']['tmp_name'];
        $upload_folder = "../../uploads/files/";
        $new_file_name = time() . "_" . $file_name;
        move_uploaded_file($tmp_name, $upload_folder . $new_file_name);
    }

    $sql = $conn -> prepare('insert into application 
    (name, email, contact, address, cover_letter, cv_path, applied_by, job_id) values
    (?, ?, ?, ?, ?, ?, ?, ?)');
    $sql -> bind_param("ssssssii", $name, $email, $contact, $address, 
    $cover_letter, $new_file_name, $applied_by, $id);
    if($sql -> execute()){
        $sql -> close();
        header("Location: application.php");
        exit();
    }
}