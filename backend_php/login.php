<?php

    include "db.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    session_start();
    $_SESSION['email'] = $email;

    $sql = $conn -> prepare('select * from users where email = ?');
    $sql -> bind_param('s', $email);
    $sql -> execute();
    $result = $sql -> get_result();
    $sql -> close();

    if($result -> num_rows > 0){
        $value = $result -> fetch_assoc();
        if(password_verify($password, $value['password'])){
            header('Location: ../public/user/user_dashboard.php');
            exit();
        } else {
            $_SESSION['password_error'] = 'Incorrect Password';
            header('Location: ../public/verification/login.php');
            exit();
        }
    } else {
        $_SESSION['email_error'] = 'Incorrect Email';
        header('Location: ../public/verification/login.php');
        exit();
    }
    
?>
