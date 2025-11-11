<?php
session_start();
include("db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
      header("Location: ../public/admin/admin-dashboard.php");
    } elseif ($user['role'] == 'employer') {
      header("Location: ../public/employer/employer-dashboard.php");
    } else {
      header("Location: ../public/user/user-dashboard.php");
    }
    exit;
  } else {
    echo "Invalid password.";
  }
} else {
  echo "No user found with that email.";
}
?>
