<?php
if(isset($_GET['action'], $_GET['id'], $_GET['job_id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];
    $job_id = $_GET['job_id'];

    if($action == 'Accepted'){
        $accepted_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $accepted_sql -> bind_param("si", $action, $id);

        if($accepted_sql -> execute()){
            $accepted_sql -> close();
            $job_status_change_sql = $conn -> prepare("update jobs set status = 'Closed' where job_id = ?");
            $job_status_change_sql -> bind_param("i", $job_id);
            
            if($job_status_change_sql -> execute()){
                $job_status_change_sql -> close();
                $application_status_change_sql = $conn -> prepare("update application set status = 'Rejected' where status = 'Pending' and job_id = ?");
                $application_status_change_sql -> bind_param("i", $job_id);
                $application_status_change_sql -> execute();
                $application_status_change_sql -> close();
            }
        }
    }

    if($action == 'Rejected'){
        $rejected_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $rejected_sql -> bind_param("si", $action, $id);
        $rejected_sql -> execute();
        $rejected_sql -> close();
    }

    if($action == 'Pending'){
        $pending_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $pending_sql -> bind_param("si", $action, $id);
        $pending_sql -> execute();
        $pending_sql -> close();
    }
}

$id = $_GET['id'];
$job_id = $_GET['job_id'];
$sql = $conn->prepare("select * from application where application_id=?");
$sql->bind_param("i",$id);
$sql->execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql->close();