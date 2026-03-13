<?php
include "../../backend/db.php";

if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../verification/login.php");
    exit();
}
if(isset($_GET['action'],$_GET['id'])){
    $id = $_GET['id'];

    if($_GET['action'] == 'delete'){
        $delete_sql = $conn -> prepare("delete from users where user_id = ?");
        $delete_sql -> bind_param("i", $id);
        $delete_sql -> execute();
        $delete_sql -> close();        
    }
}

$sql = "select * from users where role = 'employer'";
$result = mysqli_query($conn, $sql);
$values = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>