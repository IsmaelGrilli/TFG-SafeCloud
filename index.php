<?php
session_start();
require 'funciones.php';

$_SESSION['logueado'] = false;

if(isset($_POST['signup'])) {
  header("Location: signup.php");
}

$login="";

if(isset($_POST["iniciar"])) {
  $login = login($_POST["nomUsu"], $_POST["Pass"]);
}

if($_SESSION["logueado"] != true) {
  $form = "<form class='d-flex' method='POST' action='./index.php'>
  <button class='btn btn-outline-success me-2' type='submit' name='signup'>Regístrate</button>
  <button class='btn btn-outline-primary' type='button' name='login' data-bs-toggle='modal' data-bs-target='#exampleModal'>Inicia Sesión</button>
</form>";
} else {
  $form = "<a class='btn btn-outline-danger' href='index.php?logout=yes'>Cerrar sesión</a>";
}

if (isset($_GET["logout"])) {
  logout();
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>SafeCloud - Página Principal</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link href="./bootstrap-icons-1.8.2/bootstrap-icons.css" rel="stylesheet"/>    
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
    <?= $form ?>
  </div>
</nav>
<div><?= $login ?></div>

<!-- carousel -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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

<!-- body -->

<div class="container mt-4">
  <h1 class="display-4">Primeros Pasos: Iníciate en el uso de SafeCloud™</h1>
</div>

<div class="container mt-4">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
    <img src="img/creacuenta.png" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Crea una cuenta en el terminal Safecloud</h5>
        <p class="card-text">Inscríbete en el servicio SafeCloud de tu empresa y comienza a utilizarlo.</p>
        <a href="./signup.php" class="btn btn-primary">Regístrate</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
    <img src="img/ayuda.gif" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">¿Necesitas ayuda?</h5>
        <p class="card-text">Observa nuestro tutorial sobre el uso de SafeCloud.</p>
        <a href="./tutorial.php" class="btn btn-primary">Ver Tutorial</a>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container">

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicia Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="index.php" method="POST">
              <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i
                class="bi bi-person-plus-fill text-white"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" name="nomUsu">
                </div>            
                <div class="input-group mb-3">
                  <span class="input-group-text bg-primary"><i
                  class="bi bi-key-fill text-white"></i></span>
                  <input type="password" class="form-control" placeholder="Contraseña" name="Pass">
                </div>
                <div class="d-grid col-12 mx-auto">
                  <button class="btn btn-primary" type="submit" name="iniciar">Iniciar Sesión</button>
                </div>
                <p class="text-center mt-3">¿No tienes una cuenta todavía?
                  <a href="signup.php">Regístrate</span>
                </p>
              </form>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>