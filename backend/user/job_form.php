<?php
include '../../backend/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_GET['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $cover_letter = trim($_POST['letter']);
    $cv = trim($_POST['cv']);
    $applied_by = $_SESSION['user_id'];

    $sql = $conn -> prepare('insert into application 
    (name, email, contact, address, cover_letter, cv_path, applied_by, job_id) values
    (?, ?, ?, ?, ?, ?, ?, ?)');
    $sql -> bind_param("ssssssii", $name, $email, $contact, $address, 
    $cover_letter, $cv, $applied_by, $id);
    if($sql -> execute()){
        $sql -> close();
        header("Location: application.php");
        exit();
    }
}