<?php
include "../../backend/db.php";

if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../verification/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: admin_dashboard.php");
    exit();
}

$user_id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $email_check = $conn -> prepare('select user_id from users where email = ? and user_id != ?');
    $email_check -> bind_param('si', $email, $user_id);
    $email_check -> execute();
    $result = $email_check -> get_result();
    $email_check -> close();
    if($result -> num_rows > 0) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['email_error'] = "This email is already used";
        header("Location: edit_employer.php?id=$user_id");
        exit();
    }

    $query = "update users set name=?, email=?";
    $types = "ss";

    if(!empty($password)){
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $query .= ", password=?";
        $types .= "s";
    }

    $query .= " where user_id=?";
    $types .= "i";

    $sql_update = $conn -> prepare($query);

    if(!empty($password)){
        $sql_update -> bind_param($types, $name, $email, $hash_password, $user_id);
    } else {
        $sql_update -> bind_param($types, $name, $email, $user_id);
    }

    if ($sql_update -> execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } 

}

$sql_fetch = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$sql_fetch -> bind_param("i", $user_id);
$sql_fetch -> execute();
$result = $sql_fetch -> get_result();

if ($result -> num_rows > 0) {
    $value = $result -> fetch_assoc();
}

$is_error = isset($_SESSION['email_error']);
$name_value = $is_error ? ($_SESSION['name'] ?? '') : $value['name'];
$email_value = $is_error ? ($_SESSION['email'] ?? '') : $value['email'];
?>