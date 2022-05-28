<?php
	function login($nomUsu, $pass) {
		$error = "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos</div>";
		$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");
		$sql = "SELECT USUARIO FROM USERS WHERE USUARIO = ? AND CONTRASENA = ?";
		$sentenciaPreparada = mysqli_prepare($conexion, $sql);
		mysqli_stmt_bind_param($sentenciaPreparada, 'ss', $nomUsu, $pass);
		mysqli_stmt_execute($sentenciaPreparada);
		mysqli_stmt_bind_result($sentenciaPreparada, $usuario);
		if(mysqli_stmt_fetch($sentenciaPreparada)) {
			$_SESSION['logueado'] = true;
			$_SESSION['usuario'] = $usuario;
			header("Location:listaarchivos.php");
		} else {
			return $error;
		}
		mysqli_stmt_close($sentenciaPreparada);
		mysqli_close($conexion);
	}



	function creaUsu($nueNom, $nueApe, $nueUsu, $nueCorreo, $nuePass) {
		$yaExiste = "<div class='alert alert-success' role='alert'>El usuario se ha creado correctamente</div>";
		$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");
		$sql = "SELECT CORREO FROM USERS WHERE CORREO = ?";
		$sentenciaPreparada = mysqli_prepare($conexion, $sql);
		mysqli_stmt_bind_param($sentenciaPreparada, 's', $nueCorreo);
		mysqli_stmt_execute($sentenciaPreparada);
		mysqli_stmt_bind_result($sentenciaPreparada, $resulCorreo);
		if(!mysqli_stmt_fetch($sentenciaPreparada)) {
			$sql = "INSERT INTO USERS VALUES(NULL,?, ?, ?, ?, ?)";
			$sentenciaPreparada = mysqli_prepare($conexion, $sql);
			mysqli_stmt_bind_param($sentenciaPreparada, 'sssss', $nueNom, $nueApe, $nueUsu, $nueCorreo, $nuePass);
			mysqli_stmt_execute($sentenciaPreparada);
			mysqli_stmt_close($sentenciaPreparada);
			mysqli_close($conexion);
		} else {
			$yaExiste = "<div class='alert alert-danger' role='alert'>Error, el correo electrónico ya está en uso en el sistema</div>";
		}
		return $yaExiste;
		mysqli_stmt_close($sentenciaPreparada);
		mysqli_close($conexion);

	}


	function administrar() {
		$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");
		$sql = "SELECT ID, ARCHIVO, FECHA, TAMAGNO, PROPIETARIO FROM FILES";
		$sentenciaPreparada = mysqli_prepare($conexion, $sql);
		mysqli_stmt_execute($sentenciaPreparada);
		mysqli_stmt_bind_result($sentenciaPreparada, $id, $file, $fecha, $tamagno, $propie);
		$archivos = "";
		while(mysqli_stmt_fetch($sentenciaPreparada)) {
			$archivos = $archivos."
			<div class='col-sm-6 mx-auto mt-3 mb-3'>
    			<div class='card'>
      				<div class='card-body'>
        				<h5 class='card-title'>$id. $file</h5>
						<h6 class='card-subtitle mb-2 text-muted'>$fecha | $propie</h6>
        				<p class='card-text'>$tamagno</p>
						<a href='listaarchivos.php?rm=$id' class='btn btn-danger'><i class='bi bi-trash3-fill'></i></a>
        				<a href='listaarchivos.php?id=$id' class='btn btn-primary'><i class='bi bi-box-arrow-down'></i></a>
      				</div>
    			</div>
  			</div>";
		}
		mysqli_stmt_close($sentenciaPreparada);
		mysqli_close($conexion);
		return $archivos;
	}



	function ver($usuario) {
		$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");
		$sql = "SELECT ID, ARCHIVO, FECHA, TAMAGNO FROM FILES WHERE PROPIETARIO = ?";
		$sentenciaPreparada = mysqli_prepare($conexion, $sql);
		mysqli_stmt_bind_param($sentenciaPreparada, 's', $usuario);
		mysqli_stmt_execute($sentenciaPreparada);
		mysqli_stmt_bind_result($sentenciaPreparada, $id, $file, $fecha, $tamagno);
		$archivos = "";
		while(mysqli_stmt_fetch($sentenciaPreparada)) {
			$archivos = $archivos."
			<div class='col-sm-6 mx-auto mt-3 mb-3'>
    			<div class='card'>
      				<div class='card-body'>
        				<h5 class='card-title'>$id. $file</h5>
						<h6 class='card-subtitle mb-2 text-muted'>$fecha</h6>
        				<p class='card-text'>$tamagno</p>
						<a href='listaarchivos.php?rm=$id' class='btn btn-danger'><i class='bi bi-trash3-fill'></i></a>
        				<a href='listaarchivos.php?id=$id' class='btn btn-primary'><i class='bi bi-box-arrow-down'></i></a>
      				</div>
    			</div>
  			</div>";
		}
		mysqli_stmt_close($sentenciaPreparada);
		mysqli_close($conexion);
		return $archivos;
	}



	function logout() {
		session_destroy();
		header("Location: index.php");
	}
?>