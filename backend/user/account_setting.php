<?php
$user_id = $_SESSION['user_id'];

if(isset($_POST['name_submit'])){
    $name = trim($_POST['name']);
    $sql = $conn -> prepare("update users set name = ? where user_id = ?");
    $sql -> bind_param("si", $name, $user_id);
    $sql -> execute();
    $sql -> close();
}

if(isset($_POST['password_submit'])){
    $password = trim($_POST['password']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = $conn -> prepare("update users set password = ? where user_id = ?");
    $sql -> bind_param("si", $hash_password, $user_id);
    $sql -> execute();
    $sql -> close();
}

$sql = $conn -> prepare("select * from users left join profiles on profiles.user_id = users.user_id where users.user_id = ?");
$sql->bind_param("i", $user_id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result->fetch_assoc();
$sql->close();
