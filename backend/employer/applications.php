<?php
include '../../backend/db.php';

if (!isset($_GET['id'])) {
    header("Location: employer_dashboard.php");
    exit();
}

$id = $_GET['id'];
$job_title = $_GET['job'];

$sql = $conn -> prepare("select * from application where job_id = ?");
$sql -> bind_param("i", $id);
$sql -> execute();
$result = $sql -> get_result();
$values = $result -> fetch_all(MYSQLI_ASSOC);
$sql -> close();