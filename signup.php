<?php
session_start();
require 'funciones.php';

$yaExiste = "";

if (isset($_POST['creaUsu'])) {
	$yaExiste = creaUsu($_POST['nueNom'], $_POST['nueApe'], $_POST['nueUsu'], $_POST['nueCorreo'], $_POST['nuePass']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SafeCloud - Regístrate</title>
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
  </div>
</nav>

<!-- body -->

<div class="vh-100 container-fluid" style="background-color: #eee;">
    <div style="margin-top: 100px;">
      <div class="rounded d-flex justify-content-center">
        <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
          <div class="text-center">
            <h3 class="text-primary">Regístrate</h3>
          </div>
          <div class="p-4">
            <form action="signup.php" method="POST">
              <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i
                class="bi bi-person-plus-fill text-white"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" name="nueNom">
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Apellidos" name="nueApe">
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Usuario" name="nueUsu">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text bg-primary"><i
                  class="bi bi-envelope text-white"></i></span>
                <input type="email" class="form-control" placeholder="Correo" name="nueCorreo">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text bg-primary"><i
                  class="bi bi-key-fill text-white"></i></span>
                  <input type="password" class="form-control" placeholder="Contraseña" name="nuePass">
                </div>
                <div class="d-grid col-12 mx-auto">
                  <button class="btn btn-primary" type="submit" name="creaUsu">Registrarse</button>
                </div>
                <p class="text-center mt-3">¿Ya tienes una cuenta?
                  <a href="index.php">Inicia Sesión</span>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>