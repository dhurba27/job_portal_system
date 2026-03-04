<?php
session_start();
include '../../backend/admin/add_employer.php'; 
?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Employer</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/navbar.css">
  <link rel="stylesheet" href="../../css/icon.css">
  <link rel="stylesheet" href="../../css/admin/add_employer.css">
  <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

  <?php include "../navbar.php" ?>

  <div class="container">

    <h2>Create Employer</h2>
  
    <form class="form" id="form" action="" method="POST">
  
      <div>

        <label class="input_container">
          <img src="../../icons/user.png" alt="">
          <input type="text" id="name" name="name" placeholder="Full Name" 
          value="<?= htmlspecialchars($_SESSION['name'] ?? '') ?>" required>
        </label>

        <div class="error" id="nameError"></div>
      </div>
      
      <div>

        <label class="input_container">
          <img src="../../icons/email.png" alt="">
          <input type="email" id="email" name="email" placeholder="Email" 
          value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" required>
        </label>

        <div class="error" id="emailError">
          <?= $_SESSION['email_error'] ?? ''; ?>
        </div>
      </div>

      <div>

       <label class="input_container">
          <img src="../../icons/padlock.png" alt="">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <img src="../../icons/invisible.png" alt="image" id="invisible_icon">
        </label>

        <div class="error" id="passwordError"></div>
      </div>      
      
      <button class="button" type="submit">Create</button>
  
      <?php
        unset($_SESSION['email_error']); 
        unset($_SESSION['name']); 
        unset($_SESSION['email']); 
      ?>
    </form>

  </div>
  
  <script src="../../js/form.js"></script>
  <script src="../../js/password.js"></script>

</body>

</html>