<?php
include '../../backend/db.php';
$sql = $conn -> prepare(
    'select job.* from application as app
    join jobs as job on app.job_id = job.job_id 
    where applied_by = ?');
$sql -> bind_param('i', $_SESSION['user_id']);
$sql -> execute();
$result = $sql -> get_result();
$values = $result -> fetch_all(MYSQLI_ASSOC);
$sql -> close();