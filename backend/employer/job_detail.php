<?php
include '../../backend/db.php';


if(isset($_GET['action'], $_GET['id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    if($_GET['action'] == 'delete'){
        $delete_sql = $conn -> prepare("delete from jobs where job_id = ?");
        $delete_sql -> bind_param("i", $id);
        if($delete_sql -> execute()){
            $delete_sql -> close();
            header("location: employer_dashboard.php");
            exit();
        }
    }

    if($action == 'Active'){
        $active_sql = $conn -> prepare("update jobs set status = ? where job_id = ?");
        $active_sql -> bind_param("si", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }

    if($action == 'Suspended'){
        $suspended_sql = $conn -> prepare("update jobs set status = ? where job_id = ?");
        $suspended_sql -> bind_param("si", $action, $id);
        $suspended_sql -> execute();
        $suspended_sql -> close();
    }

    if($action == 'Closed'){
        $closed_sql = $conn -> prepare("update jobs set status = ? where job_id = ?");
        $closed_sql -> bind_param("si", $action, $id);
        $closed_sql -> execute();
        $closed_sql -> close();
    }
}


$id = $_GET['id'];
$sql = $conn -> prepare("select * from jobs where job_id = ?");
$sql -> bind_param("i", $id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql -> close();