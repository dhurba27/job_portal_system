<?php
session_start();
include '../../backend/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch existing profile
$sql = $conn->prepare("SELECT * FROM profiles WHERE user_id = ?");
$sql->bind_param("i", $user_id);
$sql->execute();
$result = $sql->get_result();
$profile = $result->fetch_assoc();
$sql->close();

// Handle form submit
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $bio = trim($_POST['bio']);
    $address = trim($_POST['address']);
    $contact = trim($_POST['contact']);

    if($profile){
        // Update
        $update = $conn->prepare("UPDATE profiles SET bio=?, address=?, contact=? WHERE user_id=?");
        $update->bind_param("sssi", $bio, $address, $contact, $user_id);
        $update->execute();
        $update->close();
    } else {
        // Insert
        $insert = $conn->prepare("INSERT INTO profiles (user_id, bio, address, contact) VALUES (?, ?, ?, ?)");
        $insert->bind_param("isss", $user_id, $bio, $address, $contact);
        $insert->execute();
        $insert->close();
    }

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/profile.css">
    <link rel="stylesheet" href="../../css/form.css">
    <style>


    </style>
</head>
<body>

<?php include '../navbar.php' ?>

<div class="profile_container">

    <div class="profile_image">
        <img src="../../image/01.jpg" alt="">
    </div>

    <div class="profile_info">
        <form method="POST" class="label_form">

            <h1>Edit Profile</h1>

            <div>
                <label>Name</label>
                <input type="text" name="name">
            </div>

            <div>
                <label>Bio</label>
                <textarea name="bio" rows="4"><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
            </div>

            <div>
                <label>Address</label>
                <input type="text" name="address"
                       value="<?= htmlspecialchars($profile['address'] ?? '') ?>">
            </div>

            <div>
                <label>Contact</label>
                <input type="text" name="contact"
                       value="<?= htmlspecialchars($profile['contact'] ?? '') ?>">
            </div>

            <button type="submit" class="profile_edit_button">
                Save Changes
            </button>

        </form>
    </div>

</div>

</body>
</html>