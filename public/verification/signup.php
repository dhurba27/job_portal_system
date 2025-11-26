<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Signup - Job Portal</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

  <div class="form_container">

    <h2 style="text-align: center;">SIGN UP</h2>

    <form class="form" id="form" action="../../backend_php/signup.php" method="POST">
  
      <div>
        <input type="text" id="name" name="name" placeholder="Full Name" value="<?php echo $_SESSION['name'] ?? '' ?>" required>
        <div class="error" id="nameError"></div>
      </div>
      
      <div>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'] ?? '' ?>" required>
        <div class="error" id="emailError">
          <?php echo $_SESSION['email_error'] ?? ''; ?>
        </div>
      </div>
      
      <div>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <div class="error" id="passwordError"></div>
      </div>
      
      <button type="submit">Sign Up</button>
      <p>Already have an account? <a href="login.php">Login</a></p>
  
      <?php 
        unset($_SESSION['email_error']); 
        unset($_SESSION['name']); 
        unset($_SESSION['email']); 
      ?>
    </form>

  </div>


  <script src="../../js/form.js"></script>

</body>

</html>