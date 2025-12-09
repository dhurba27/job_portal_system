<?php
include '../../backend/db.php';
$sql = $conn -> prepare("select * from Jobs join Users on created_by = user_id where created_by = ?");
$sql -> bind_param("i", $_SESSION['user_id']);
$sql -> execute();
$result = $sql -> get_result();
$sql -> close();
$values = $result->fetch_all(MYSQLI_ASSOC);