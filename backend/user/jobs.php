<?php
include '../../backend/db.php';

$search = htmlspecialchars(trim($_GET['search'] ?? ''));
$location = htmlspecialchars(trim($_GET['location'] ?? ''));
$category = $_GET['job_type'] ?? '';

$query = "select * from jobs where status='Active'";
$params = [];
$types = "";

if(!empty($search)){
    $query .= " and job_title like ?";
    $params[] = "%$search%";
    $types .= "s";
}

if(!empty($location)){
    $query .= " and location like ?";
    $params[] = "%$location%";
    $types .= "s";
}

if(!empty($category)){
    $query .= " and job_type = ?";
    $params[] = $category;
    $types .= "s";
}

$sql = $conn->prepare($query);

if(!empty($params)){
    $sql->bind_param($types, ...$params);
}

$sql->execute();
$result = $sql->get_result();
$values = $result->fetch_all(MYSQLI_ASSOC);
$sql->close();
