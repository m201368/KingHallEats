<?php
  session_start();
  unset($_COOKIE['user']);
  setcookie('user', '', time()-86400);
  header("Location: welcomePage.php");
?>
