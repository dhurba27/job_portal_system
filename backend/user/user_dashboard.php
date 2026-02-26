<?php
include '../../backend/db.php';
$sql_fetch = $conn -> prepare("select * from jobs where status = 'Active'");
$sql_fetch -> execute();
$result = $sql_fetch -> get_result();
$values = $result -> fetch_all(MYSQLI_ASSOC);
$sql_fetch -> close();

$currentDate = date("Y-m-d");
foreach($values as $value){
    if($currentDate > $value['deadline']){
        $sql_update = $conn -> prepare("update jobs set status = 'expired' where job_id = ?");
        $sql_update -> bind_param("i", $value['job_id']);
        $sql_update -> execute();
        $sql_update -> close();
    }
}