<?php

    include "db.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

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
        }
    }
    
?>
