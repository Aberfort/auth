<?php

session_start();

if ( isset( $_SESSION['isLogged'] ) ) {
  header( 'Location: home.php' );
  exit;
}

if ( isset( $_SESSION["error"] ) ) {
  $_SESSION ['attempt_failed'] ++;
}

var_dump( $_SESSION ['attempt_failed'] );

if ( $_SESSION ['attempt_failed'] > 2 ) {

  $fail = true;

  if ( empty( $_SESSION['startTime'] ) ) {
    $_SESSION['startTime'] = time();
  }

  $startTime = time() - $_SESSION['startTime'];

  if ( $startTime > 300 ) {
    unset( $_SESSION['startTime'] );
    unset( $_SESSION["attempt_failed"] );
    unset( $_SESSION["error"] );
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="../build/css/style.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="login">
  <h1>Login</h1>
  <?php
  if ( isset( $_SESSION["error"] ) ) {
    $error = $_SESSION["error"];
    echo "<h2>$error</h2>";
  }
  ?>

  <form action="authenticate.php" method="post">
    <label for="username">
      <i class="fas fa-user"></i>
    </label>
    <input type="text" name="username" placeholder="Username" id="username" required>
    <label for="password">
      <i class="fas fa-lock"></i>
    </label>
    <input type="password" name="password" placeholder="Password" id="password" required>
    <?php if ( $fail ) {
      echo '<span>Попробуйте еще раз через ' . ( 300 - $startTime ) . ' секунд</span>';
    } else { ?>
      <input type="submit" value="Login">
    <?php } ?>
  </form>
</div>
</body>
</html>