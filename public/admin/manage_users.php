<?php
include("../../backend_php/db.php");
$sql = "select * from users";
$result = mysqli_query($conn, $sql);
$values = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

        <h2>All Users</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            <?php foreach($values as $value) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($value['name']); ?></td>
                    <td><?php echo htmlspecialchars($value['email']); ?></td>
                    <td><?php echo htmlspecialchars($value['role']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>