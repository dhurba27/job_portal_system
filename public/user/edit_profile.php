<?php
session_start();
include '../../backend/db.php';

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/user/edit_profile.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>
<body>

<?php include '../navbar.php' ?>

<div class="edit_profile_container">

    <div class="profile_image">
        <img src="../../uploads/images/<?= htmlspecialchars($profile['photo'] ?? 'default.jpg') ?>" alt="Profile Photo">
    </div>

    <form method="POST" class="label_form">

        <h1>Edit Profile</h1>

        <div>
            <label class="label" for="bio">Bio</label>
            <textarea class="textarea" name="bio" id="bio" rows="4" required><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="label" for="address">Address</label>
            <input class="input" type="text" name="address" id="address" value="<?= htmlspecialchars($profile['address'] ?? '') ?>" required>
        </div>

        <div>
            <label class="label" for="contact">Contact</label>
            <input class="input" type="text" name="contact" id="contact" value="<?= htmlspecialchars($profile['contact'] ?? '') ?>" required>
        </div>

        <button type="submit" class="profile_edit_button">
            Save Changes
        </button>

    </form>

</div>

</body>
</html>