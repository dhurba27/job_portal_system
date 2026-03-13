<?php
include '../../backend/db.php';
$currentDate = date("Y-m-d");

$sql_update = $conn->prepare("
    update jobs 
    set status = 'Expired' 
    where status = 'Active' 
    and deadline < ?
");
$sql_update->bind_param("s", $currentDate);
$sql_update->execute();
$sql_update->close();

$sql = $conn -> prepare("select * from Jobs join Users on created_by = user_id where created_by = ? order by FIELD(status, 'Active', 'Draft', 'Suspended', 'Closed', 'Expired'),posted_on DESC");
$sql -> bind_param("i", $_SESSION['user_id']);
$sql -> execute();
$result = $sql -> get_result();
$values = $result->fetch_all(MYSQLI_ASSOC);
$sql -> close();