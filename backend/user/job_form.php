<?php
include '../../backend/db.php';

if(!isset($_SESSION['user_role'])){
    header("Location: ../verification/login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_GET['id'];
    $applied_by = $_SESSION['user_id'];

    $sql = $conn->prepare("SELECT bio, address, contact FROM profiles WHERE user_id = ?");
    $sql->bind_param("i", $applied_by);
    $sql->execute();
    $result = $sql->get_result();
    $profile = $result->fetch_assoc();
    $sql->close();

    if(!$profile){
        header("Location: profile.php?error=incomplete");
        exit();
    }

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $cover_letter = trim($_POST['letter']);

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {

        $file_name = $_FILES['cv']['name'];
        $tmp_name  = $_FILES['cv']['tmp_name'];
        $file_size = $_FILES['cv']['size'];
        $upload_folder = "../../uploads/";
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