<?php
include("../../api/db.php");

// Ensure admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.html");
    exit;
}

$message = "";

// Delete user
if (isset($_GET['delete_user'])) {
    $user_id = intval($_GET['delete_user']);
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $message = "<p class='success'> User deleted successfully.</p>";
    } else {
        $message = "<p class='error'> Failed to delete user.</p>";
    }
}

// Fetch all users
$users_stmt = $conn->prepare("SELECT * FROM users ORDER BY id DESC");
$users_stmt->execute();
$users_result = $users_stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Users - Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f5f7;
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
            background: #0056b3;
            padding: 8px 15px;
            border-radius: 5px;
            margin-left: 10px;
        }

        .navbar a:hover {
            background: #004080;
        }

        .container {
            background: white;
            width: 90%;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #FFF;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .btn {
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }

        .no-data {
            text-align: center;
            color: gray;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Admin Dashboard</h2>
        <div>
            <a href="admin-dashboard.php">Jobs</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="../../api/logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <?php if ($message) echo $message; ?>

        <h2>All Users</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php if ($users_result->num_rows > 0) { ?>
                <?php while ($user = $users_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn edit-btn">Edit</a>
                            <a href="manage_users.php?delete_user=<?php echo $user['id']; ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" class="no-data">No users found.</td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>