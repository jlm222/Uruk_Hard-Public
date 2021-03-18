<?php 
  session_start(); 

  if(!isset( $_SESSION['user_id'], $_SESSION['username'], $_SESSION['user_role'] )) {

      header('Location: signin.php');
      exit();

  } else if ($_SESSION['user_role'] !== 'admin') {
      header('Location: signin.php');
      exit();
  }
?>