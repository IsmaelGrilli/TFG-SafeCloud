<?php
session_start();

include 'archivos.php';

require 'funciones.php';

$form = "";
$noLogueado = false;

if($_SESSION['logueado'] != true) {
  $noLogueado = "<div class='alert alert-danger' role='alert'>Error: Sesión no iniciada. <a href='index.php' class='alert-link'>Volver a la página principal</a></div>";
} else {
  $form = "<a class='btn btn-outline-danger' href='index.php?logout=yes'>Cerrar sesión</a>";

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SafeCloud - Mis archivos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link href="./bootstrap-icons-1.8.2/bootstrap-icons.css" rel="stylesheet"/>    
</head>

<body style="background-color: #eee;">

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
    <?= $form ?>
  </div>
</nav>

<!-- body -->

<div class="vh-100 container-fluid" style="background-color: #eee;">
  <?php
    if ($noLogueado != false) {
			echo $noLogueado;
			die();
		}

    if ($_SESSION['usuario'] == "admin" and !isset($_POST['buscar'])) {
      $archivos = administrar();
    } else if($_SESSION['usuario'] == "admin" and isset($_POST['buscar'])) {
      $archivos = filtrarAdmin($_POST['consulta']);
    } else if($_SESSION['usuario'] != "admin" and !isset($_POST['buscar'])){
      $archivos = ver($_SESSION['usuario']);
    } else if($_SESSION['usuario'] != "admin" and isset($_POST['buscar'])) {
      $archivos = filtrarUsu($_SESSION['usuario'], $_POST['consulta']);
    }
  ?>
  <form action="listaarchivos.php" method="POST" enctype="multipart/form-data">
  <div class="container text-center" style="margin-top: 100px">
    <input class="form-control" type="file" name="newFile">
    <button type="submit" class="btn btn-primary mt-2" name="subir">Subir Archivo</button>
  </div>
  
  </form>

  <hr>
  <div class="container mt-4 rounded border" style="background-color: white;">
    <form action="listaarchivos.php" method="POST" class="mx-auto mt-3 mb-3">
      <div class="input-group mb-3">  
      <input type="text" class="form-control" name="consulta" placeholder="Introduce tu búsqueda..."><button type="submit" class="btn btn-primary" name="buscar"><i class="bi bi-search mx-auto mt-3 mb-3"></i></button>      
      </div>
    </form>  
    <div class="row">
    <?php echo $archivos; ?>
    </div>  
  </div>

</div>