<?php include '../../backend/login.php' ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login - Job Portal</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/icon.css">
  <link rel="stylesheet" href="../../css/form.css">
  <link rel="stylesheet" href="../../css/verification/login.css">
</head>

<body>
  <div class="form_container">

    <h2>LOGIN</h2>

    <form class="form" id="form" action="" method="POST">
  
      <div>

        <label class="input_container" for="email">
          <img src="../../icons/email.png" alt="">
          <input type="email" id="email" name="email" placeholder="Email" 
          value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" required>
        </label>

        <div class="error" id="emailError">
          <?= $_SESSION['email_error'] ?? '' ?>
        </div>

      </div>
      
      <div>

        <label class="input_container" for="password">
          <img src="../../icons/padlock.png" alt="">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <img src="../../icons/invisible.png" alt="image" id="invisible_icon">
        </label>

        <div class="error" id="passwordError">
          <?= $_SESSION['password_error'] ?? '' ?>
        </div>

      </div>
  
      <button class="button" type="submit">Login</button>
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  
      <?php 
        unset($_SESSION['email_error']); 
        unset($_SESSION['password_error']); 
        unset($_SESSION['email']); 
      ?>
    </form>

  </div>

  <script src="../../js/form.js"></script>
  <script src="../../js/password.js"></script>
</body>
</html>