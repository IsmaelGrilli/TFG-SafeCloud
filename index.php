<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SafeCloud - Main Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>    
</head>

<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SafeCloud</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Página Principal</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link" href="#">Contáctanos</a>
        </li>
      </ul>  
    </div>
    <form class="d-flex">
        <button class="btn btn-outline-primary me-2" type="submit">Regístrate</button>
        <button class="btn btn-outline-success" type="submit">Inicia Sesión</button>
    </form>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" width="100%" height="30%">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/carousel1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/carouselplantilla.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>¿Qué es Safecloud?</h5>
        <p>SafeCloud™ es un modelo de nube capaz de ser almacenado de forma local en unas dependencias, de modo que se pueda acceder al mismo dentro del propio entorno sin requerir una conexión constante a Internet.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/carouselplantilla.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>¿Con qué funciones cuenta?</h5>
        <p>Safecloud™ permite subir, almacenar, renombrar, ordenar y descargar archivos en la propia red local. Cada usuario podrá acceder con una cuenta propia y almacenar sus archivos de forma segura.</p>
      </div>
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div></div>
    
</body>
</html>