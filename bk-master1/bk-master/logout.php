<?php
  session_start();
  // hapus session
  unset($_SESSION["user"]);

  // redirect ke halaman login.php
  header("Location: login.php");
?>
