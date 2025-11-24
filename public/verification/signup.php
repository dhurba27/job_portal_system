<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Signup - Job Portal</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/verification/signup.css">
</head>

<body>

  <form id="signup_form" action="../../backend_php/signup.php" method="POST">
    <h2 style="text-align: center;">SIGN UP</h2>

    <input type="text" id="name" name="name" placeholder="Full Name" value="<?php echo $_SESSION['name'] ?? '' ?>" required>
    <div class="error" id="nameError"></div>
    
    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ?? '' ?>" required>
    <div class="error" id="emailError">
      <?php echo $_SESSION['email_error'] ?? ''; ?>
    </div>
    
    <input type="password" id="password" name="password" placeholder="Password" required>
    <div class="error" id="passwordError"></div>
    
    <button type="submit">sign up</button>
    <p>Already have an account? <a href="login.php">Login</a></p>

    <?php 
      unset($_SESSION['email_error']); 
      unset($_SESSION['name']); 
      unset($_SESSION['email']); 
    ?>
  </form>

  <script src="../../js/signup.js"></script>

</body>

</html>