<?php
session_start();
include '../db.php';
header('Content-Type: application/json');
$user_id = $_SESSION['user_id'];
if (isset($_POST['email'])) {

    $email = trim($_POST['email']);
    $email_check = $conn -> prepare('select * from users where email = ?');
    $email_check -> bind_param('s', $email);
    $email_check -> execute();
    $result = $email_check -> get_result();
    $email_check -> close();
    if($result -> num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'This email is already used']);
        exit();
    } else {
        $sql = $conn -> prepare("update users set email = ? where user_id = ?");
        $sql -> bind_param("si", $email, $user_id);
        $sql -> execute();
        $sql -> close();

        echo json_encode([
            'status' => 'success'
        ]);
        exit();
    }

}