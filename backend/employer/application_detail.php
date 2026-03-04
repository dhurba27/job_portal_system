<?php
if(isset($_GET['action'], $_GET['id'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == 'Accepted'){
        $active_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $active_sql -> bind_param("si", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }

    if($action == 'Rejected'){
        $active_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $active_sql -> bind_param("si", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }

    if($action == 'Pending'){
        $active_sql = $conn -> prepare("update application set status = ? where application_id = ?");
        $active_sql -> bind_param("si", $action, $id);
        $active_sql -> execute();
        $active_sql -> close();
    }
}

$id = $_GET['id'];
$sql = $conn->prepare("select * from application where application_id=?");
$sql->bind_param("i",$id);
$sql->execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql->close();