<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Job Portal</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

  <?php include "navbar.php" ?>

  <div class="container">

    <h2>Create User</h2>
  
    <form class="label_form" id="form" action="../../backend_php/add_user.php" method="POST">
  
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

      <div>
        <select name="role" id="role">
            <option value="null">Select User</option>
            <option value="admin">Admin</option>
            <option value="employer">Employer</option>
        </select>
        <div class="error" id="selectError"></div>
      </div>
      
      <button type="submit">Create</button>
  
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