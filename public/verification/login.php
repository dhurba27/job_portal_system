<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login - Job Portal</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/form.css">
</head>

<body>
  <div class="form_container">

    <h2 style="text-align: center;">LOGIN</h2>

    <form class="form" id="form" action="../../backend_php/login.php" method="POST">
  
      <div>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ?? '' ?>" required>
        <div class="error" id="emailError">
          <?php echo $_SESSION['email_error'] ?? '' ?>
        </div>
      </div>
      
      <div>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <div class="error" id="passwordError">
          <?php echo $_SESSION['password_error'] ?? '' ?>
        </div>
      </div>
  
      <button type="submit">Login</button>
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  
      <?php 
        unset($_SESSION['email_error']); 
        unset($_SESSION['password_error']); 
        unset($_SESSION['email']); 
      ?>
    </form>

  </div>

  <script src="../../js/form.js"></script>
</body>
</html>