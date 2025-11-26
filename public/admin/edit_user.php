<?php
include("../../backend_php/db.php");

// // Ensure admin is logged in
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
//     header("Location: ../index.html");
//     exit;
// }

if (!isset($_GET['id'])) {
    header("Location: manage_users.php");
    exit();
}

$user_id = intval($_GET['id']);

// Fetch user details
$sql_fetch = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$sql_fetch -> bind_param("i", $user_id);
$sql_fetch -> execute();
$result = $sql_fetch -> get_result();

if ($result -> num_rows > 0) {
    $value = $result -> fetch_assoc();
}

// Update user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];

    if ($name && $email && $role) {
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, role=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $role, $user_id);
        if ($stmt->execute()) {
            $message = "<p class='success'> User updated successfully.</p>";
        } 
    } 
}
?> 

<!DOCTYPE html>
<html>

<head>
    <title>Edit User - Admin</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="container">
        
        <h2>Edit User</h2>

        <form class="label_form" method="POST">

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($value['name']); ?>" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($value['email']); ?>" required>
            </div>

            <div>
                <label for="role">User Type</label>
                <select name="role" id="role" required>
                    <option value="user" <?php if ($value['role'] == 'user') echo 'selected'; ?>>User</option>
                    <option value="employer" <?php if ($value['role'] == 'employer') echo 'selected'; ?>>Employer</option>
                    <option value="admin" <?php if ($value['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                </select>
            </div>

            <div>
                <button type="submit">Update User</button>
            </div>
        </form>
    </div>

</body>

</html>