<?php
if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../verification/login.php");
    exit();
}
include "../../backend/db.php";
$sql = "select * from users where role = 'employer'";
$result = mysqli_query($conn, $sql);
$values = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>