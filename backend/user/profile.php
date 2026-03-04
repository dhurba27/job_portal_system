<?php
$user_id = $_SESSION['user_id'];

if (isset($_POST['photo_submit']) && isset($_FILES['photo'])) {
    
    $file = $_FILES['photo'];

    if ($file['error'] === 0) {
        
        $uploadDir = "../../uploads/images/";
        $newName = time() . "_" . $file['name'];
        $destination = $uploadDir . $newName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {

            $sql = $conn->prepare("update profiles set photo = ? where user_id = ?");
            $sql->bind_param("si", $newName, $user_id);
            $sql->execute();
            $sql->close();
        }
    }
}


$sql = $conn -> prepare("select * from users left join profiles on profiles.user_id = users.user_id where users.user_id = ?");
$sql->bind_param("i", $user_id);
$sql -> execute();
$result = $sql -> get_result();
$value = $result->fetch_assoc();
$sql->close();