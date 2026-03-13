<?php
if(isset($_GET['action'], $_GET['id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == 'Accepted'){
        $accepted_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $accepted_sql -> bind_param("si", $action, $id);
        $accepted_sql -> execute();
        $accepted_sql -> close();
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
$sql = $conn->prepare("select * from application where application_id=?");
$sql->bind_param("i",$id);
$sql->execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql->close();