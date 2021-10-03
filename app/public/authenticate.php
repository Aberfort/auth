<?php
session_start();

if ( ! isset( $_POST['submitted'] ) ) {
  header( 'Location: ' . $_SERVER['HTTP_REFERER'] );
}

$credentials = [
  'username' => 'admin',
  'password' => 'admin'
];

$error = "username/password incorrect";

if ( $credentials['username'] !== $_POST['username'] or $credentials['password'] !== $_POST['password'] ) {
  $_SESSION["error"] = $error;
  header( 'Location:' . '../index.php' );
} else {
  $_SESSION["isLogged"] = true;
  $_SESSION["name"]     = $_POST['username'];
  $_SESSION["password"] = $_POST['password'];
  header( 'Location:' . '../home.php' );
}

exit();