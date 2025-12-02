<?php
session_start();
include '../../backend/admin/add_employer.php'; 
?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Employer</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

  <?php include "../navbar.php" ?>

  <div class="container">

    <h2>Create Employer</h2>
  
    <form class="label_form" id="form" action="" method="POST">
  
      <div>
        <input type="text" id="name" name="name" placeholder="Full Name" 
        value="<?= htmlspecialchars($_SESSION['name'] ?? '') ?>" required>
        <div class="error" id="nameError"></div>
      </div>
      
      <div>
        <input type="email" id="email" name="email" placeholder="Email" 
        value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" required>
        <div class="error" id="emailError">
          <?= $_SESSION['email_error'] ?? ''; ?>
        </div>
      </div>

      <div>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <div class="error" id="passwordError"></div>
      </div>      

      <!-- <div>
        <div class="select-div">
          <select name="role" id="role">
              <option value="null">Select User</option>
              <option value="admin" 
              <?php //($_SESSION['role'] ?? '' == 'admin') ? 'selected' : ''; ?>>
                Admin
              </option>
              <option value="employer" 
              <?php //($_SESSION['role'] ?? '' == 'employer') ? 'selected' : ''; ?>>
                Employer
              </option>
          </select>
        </div>
        <div class="error" id="selectError"></div>
      </div> -->
      
      <button class="button" type="submit">Create</button>
  
      <?php
        unset($_SESSION['email_error']); 
        unset($_SESSION['name']); 
        unset($_SESSION['email']); 
        // unset($_SESSION['role']);
      ?>
    </form>

  </div>
  
  <script src="../../js/form.js"></script>

</body>

</html>