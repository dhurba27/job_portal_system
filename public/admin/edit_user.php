<?php
// include("../../api/db.php");

// // Ensure admin is logged in
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
//     header("Location: ../index.html");
//     exit;
// }

// $message = "";

// if (!isset($_GET['id'])) {
//     header("Location: manage_users.php");
//     exit;
// }

// $user_id = intval($_GET['id']);

// // Fetch user details
// $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
// $stmt->bind_param("i", $user_id);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows == 0) {
//     $message = "<p class='error'> User not found.</p>";
// } else {
//     $user = $result->fetch_assoc();
// }

// // Update user
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $name = trim($_POST['name']);
//     $email = trim($_POST['email']);
//     $role = $_POST['role'];

//     if ($name && $email && $role) {
//         $stmt = $conn->prepare("UPDATE users SET name=?, email=?, role=? WHERE id=?");
//         $stmt->bind_param("sssi", $name, $email, $role, $user_id);
//         if ($stmt->execute()) {
//             $message = "<p class='success'> User updated successfully.</p>";
//         } 
//     } 
// }
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
        <form method="POST">
            <h2 style="text-align: center;">Edit User</h2>

            <input type="text" id="name" name="name" placeholder="Name" value="<?php //echo htmlspecialchars($user['name']); ?>" required>

            <input type="email" id="email" name="email" placeholder="Email" value="<?php //echo htmlspecialchars($user['email']); ?>" required>

            <select name="role" required>
                <option value="user" <?php //if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                <option value="employer" <?php //if ($user['role'] == 'employer') echo 'selected'; ?>>Employer</option>
                <option value="admin" <?php //if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select>

            <button type="submit">Update User</button>
        </form>
    </div>

</body>

</html>