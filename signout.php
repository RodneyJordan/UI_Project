<?php
  session_start();
  unset($_SESSION['UserName']);
  session_destroy();
  header('location: sign_in.php');
?>
