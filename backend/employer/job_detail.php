<?php
include '../../backend/db.php';

if(isset($_GET['action'], $_GET['id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == 'Active'){
        $active_sql = $conn -> prepare("update jobs set status = ? where job_id = ?");
        $active_sql -> bind_param("ss", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }

    if($action == 'Suspended'){
        $active_sql = $conn -> prepare("update jobs set status = ? where job_id = ?");
        $active_sql -> bind_param("ss", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }

    if($action == 'Closed'){
        $active_sql = $conn -> prepare("update jobs set status = ? where job_id = ?");
        $active_sql -> bind_param("ss", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }
}


$id = $_GET['id'];
$sql = $conn -> prepare("select * from jobs where job_id = ?");
$sql -> bind_param("s", $id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql -> close();