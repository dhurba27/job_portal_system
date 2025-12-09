<?php
include '../../backend/db.php';
$sql = $conn -> prepare("select * from jobs");
$sql -> execute();
$result = $sql -> get_result();
$values = $result -> fetch_all(MYSQLI_ASSOC);
$sql -> close();