<?php

    include "../../backend/db.php";
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    
        $sql = $conn -> prepare('select * from users where email = ?');
        $sql -> bind_param('s', $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $sql -> close();
        
        $_SESSION['email'] = $email;
    
        if($result -> num_rows > 0){
            $value = $result -> fetch_assoc();
            if(password_verify($password, $value['password'])){
                header('Location: ../user/user_dashboard.php');
                exit();
            } else {
                $_SESSION['password_error'] = 'Incorrect Password';
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['email_error'] = 'Incorrect Email';
            header('Location: login.php');
            exit();
        }

    }
    
?>
