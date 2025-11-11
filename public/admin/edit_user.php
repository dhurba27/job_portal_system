<?php
include("../../api/db.php");

// Ensure admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.html");
    exit;
}

$message = "";

if (!isset($_GET['id'])) {
    header("Location: manage_users.php");
    exit;
}

$user_id = intval($_GET['id']);

// Fetch user details
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $message = "<p class='error'> User not found.</p>";
} else {
    $user = $result->fetch_assoc();
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
        } else {
            $message = "<p class='error'> Failed to update user.</p>";
        }
    } else {
        $message = "<p class='error'> All fields are required.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User - Admin</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            background: #f4f6f8;
            margin: 0;
        }

        .navbar {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin-left: 10px;
            background: #0056b3;
        }

        .navbar a:hover {
            background: #004080;
        }

        .container {
            background: white;
            width: 50%;
            margin: 40px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #FFF;
            margin-top: 0;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success,
        .error {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Edit User - Admin</h2>
        <div>
            <a href="admin-dashboard.php">Jobs</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="../../api/logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <?php echo $message; ?>

        <?php if (!empty($user)) { ?>
            <form method="POST">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

                <label for="role">Role</label>
                <select name="role" required>
                    <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                    <option value="employer" <?php if ($user['role'] == 'employer') echo 'selected'; ?>>Employer</option>
                    <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                </select>

                <button type="submit">Update User</button>
            </form>
        <?php } ?>
    </div>

</body>

</html>