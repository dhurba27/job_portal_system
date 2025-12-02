<?php

    include "../../backend/db.php";

    if ($_SESSION['user_role'] != 'admin') {
        header("Location: ../verification/login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $user = 'employer';
        //$user = trim($_POST['role']);
        
        $email_check = $conn -> prepare('select * from users where email = ?');
        $email_check -> bind_param('s', $email);
        $email_check -> execute();
        $result = $email_check -> get_result();
        $email_check -> close();
        if($result -> num_rows > 0) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            //$_SESSION['role'] = $user;
            $_SESSION['email_error'] = "This email is already used";
            header("Location: add_employer.php");
            exit();
        }
    
        $sql = $conn -> prepare("insert into users
                (name, email, password, role) values
                (?, ?, ?, ?)");
        $sql -> bind_param("ssss", $name, $email, $password, $user);
    
        if($sql -> execute()){
            $sql -> close();
            header("Location: admin_dashboard.php");
            exit();
        }

    }

?>
