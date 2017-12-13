<?php
  session_start();
  unset($_COOKIE['user']);
  header("Location: welcomePage.php");
?>
