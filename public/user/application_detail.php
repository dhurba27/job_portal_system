<?php
session_start();
include '../../backend/db.php';
$id = $_GET['id'];
$sql = $conn->prepare("select * from application where application_id=?");
$sql->bind_param("i",$id);
$sql->execute();
$result = $sql -> get_result();
$value = $result -> fetch_assoc();
$sql->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/applications_detail.css">
</head>
<body>
    <?php include "../navbar.php" ?>
    <div class="container">
        <h2>Application</h2>
        <div class="info">
            <p>
                <b>Name : </b><?= $value['name'] ?>
            </p>
            <p>
                <b>Email : </b><?= $value['email'] ?>
            </p>
            <p>
                <b>Contact : </b><?= $value['contact'] ?>
            </p>
            <p>
                <b>Address : </b><?= $value['address'] ?>
            </p>
        </div>
        <p class="cover_letter">
            <?= $value['cover_letter'] ?>
        </p>
        <div>
            <iframe src="../../uploads/<?= $value['cv_path'] ?>" width="100%" height="600px"></iframe>
        </div>
    </div>
</body>
</html>