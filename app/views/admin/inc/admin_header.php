<?php // require "includes/admin_functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="robots" content="noindex, nofollow" />
<title>Admin</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- Custom CSS -->
<link href="<?= URLROOT; ?>/css/admin/dashboard.css" rel="stylesheet">
    
</head>
<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?= URLROOT; ?>">Uruk HARD. Play Harder</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed me-5" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav px-2">
    <li class="nav-item text-nowrap">
      <a class="nav-link fs-6 px-md-4" href="<?= URLROOT; ?>/users/logout">Logout</a>
    </li>
  </ul>
</header>

<div class="container-fluid px-md-1 px-lg-4 px-sm-1 px-1">
  <div class="row">