<?php session_start(); ?>
<?php require_once "../includes/db.inc.php"; ?>
<?php require_once "includes/admin_functions.php"; ?>

<?php
    if(!isset( $_SESSION['user_id'], $_SESSION['username'], $_SESSION['user_role'] )) {

        header('Location: signin.php');
        exit();

    } else if ($_SESSION['user_role'] !== 'admin') {
        header('Location: signin.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="robots" content="noindex, nofollow" />

    <title>Admin</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
  </head>
  <body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">Uruk HARD. Play Harder</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed me-5" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav px-2">
    <li class="nav-item text-nowrap">
      <a class="nav-link fs-6" href="includes/logout.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">