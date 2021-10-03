<?php

session_start();

if ( ! isset( $_SESSION['isLogged'] ) ) {
  header( 'Location: index.php' );
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link href="../build/css/style.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<div class="content">
  <h2>Home Page</h2>
  <p>Добрый день, <?php echo $_SESSION['name']?>!</p>
  <p><a href="../logout.php">Logout</a>
</div>
</body>
</html>
