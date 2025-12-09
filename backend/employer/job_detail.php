<?php
include '../../backend/db.php';
$id = $_GET['id'];
$sql = $conn -> prepare("select * from jobs where job_id = ?");
$sql -> bind_param("s", $id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql -> close();