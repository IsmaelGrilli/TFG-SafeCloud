<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>SafeCloud - Primeros Pasos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>    
</head>

<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">SafeCloud</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./index.php">Página Principal</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link" href="./tutorial.php">Tutorial</a>
        </li>
      </ul>  
    </div>
  </div>
</nav>