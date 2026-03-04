<?php
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = $conn -> prepare("select * from profiles where user_id = ?");
$sql->bind_param("i", $user_id);
$sql->execute();
$result = $sql->get_result();
$profile = $result->fetch_assoc();
$sql->close();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $bio = trim($_POST['bio']);
    $address = trim($_POST['address']);
    $contact = trim($_POST['contact']);

    if($profile){

        $update = $conn->prepare("update profiles SET bio=?, address=?, contact=? WHERE user_id=?");
        $update->bind_param("sssi", $bio, $address, $contact, $user_id);
        $update->execute();
        $update->close();
    } else {

        $insert = $conn->prepare("insert into profiles (user_id, bio, address, contact) VALUES (?, ?, ?, ?)");
        $insert->bind_param("isss", $user_id, $bio, $address, $contact);
        $insert->execute();
        $insert->close();
    }

    header("Location: profile.php");
    exit();
}