<?php

    include "db.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = 'user';
    
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    $email_check = $conn -> prepare('select * from users where email = ?');
    $email_check -> bind_param('s', $email);
    $email_check -> execute();
    $result = $email_check -> get_result();
    $email_check -> close();
    if($result -> num_rows > 0) {
        $_SESSION['email_error'] = "This email is already used";
        header("Location: ../public/verification/signup.php");
        exit();
    }

    $sql = $conn -> prepare("insert into users
            (name, email, password, role) values
            (?, ?, ?, ?)");
    $sql -> bind_param("ssss", $name, $email, $password, $user);

    if($sql -> execute()){
        $sql -> close();
        header("Location: ../public/verification/login.php");
        exit();
    }

?>
