<?php
include "../../backend/db.php";

// // Ensure admin is logged in
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
//     header("Location: ../index.html");
//     exit;
// }

if (!isset($_GET['id'])) {
    header("Location: manage_users.php");
    exit();
}

$user_id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];

    $email_check = $conn -> prepare('select * from users where email = ? and user_id != ?');
    $email_check -> bind_param('si', $email, $user_id);
    $email_check -> execute();
    $result = $email_check -> get_result();
    $email_check -> close();
    if($result -> num_rows > 0) {
        $_SESSION['name'] = $name;
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $email;
        $_SESSION['email_error'] = "This email is already used";
        header("Location: edit_user.php?id=$user_id");
        exit();
    }

    $sql_update = $conn -> prepare("UPDATE users SET name=?, email=?, role=? WHERE user_id=?");
    $sql_update -> bind_param("sssi", $name, $email, $role, $user_id);
    if ($sql_update -> execute()) {
        header("Location: manage_users.php");
        exit();
    } 

}


// Fetch user details

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
$role_value = $is_error ? ($_SESSION['role'] ?? '') : $value['role'];

?>