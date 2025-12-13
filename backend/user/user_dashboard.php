<?php
include '../../backend/db.php';
$sql_fetch = $conn -> prepare("select * from jobs");
$sql_fetch -> execute();
$result = $sql_fetch -> get_result();
$values = $result -> fetch_all(MYSQLI_ASSOC);
$sql_fetch -> close();