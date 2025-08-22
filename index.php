<?php
session_start();
$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sakhang Database Access Login</title>
  <link rel="stylesheet" href="styles/index-style.css">
</head>
<body>
  <div class="top-bar">
    Plez enter the username and password
  </div>
  <div class="headerbar">
    Sakhang Database Access Login
  </div>
  <div class="main-bg">
    <div class="login-box">
      <div class="login-header">Login Form</div>
      <form action="login.php" method="post">
      <?php if (!empty($error)): ?>
        <p class="error-message"><?= $error ?></p>
      <?php endif; ?>
      <form>
        <div class="fields">
          <div class="field-row">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
          </div>
          <div class="field-row">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
          </div>
          <button type="submit">Login</button>
        </div>
      </form>
      <div class="login-footer"></div>
      <div class="link"><a href="dashboard.php">Check For Waiting List Without Login</a></div>
    </div>
  </div>
  <div class="bottom-bar"></div>
</body>
</html>
