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
		$sql = "SELECT ID, ARCHIVO, DATE_FORMAT(FECHA, '%D/%M/%Y'), TAMAGNO, PROPIETARIO FROM FILES";
		$sentenciaPreparada = mysqli_prepare($conexion, $sql);
		mysqli_stmt_execute($sentenciaPreparada);
		mysqli_stmt_bind_result($sentenciaPreparada, $id, $file, $fecha, $tamagno, $propie);
		$archivos = "";
		while(mysqli_stmt_fetch($sentenciaPreparada)) {
			$archivos = $archivos."<tr>
			<td>$id</td>
			<td>$file</td>
			<td>$fecha</td>
			<td>$tamagno</td>
			<td>$propie</td>
			<td><a href='listaarchivos.php?id=$id'>Descargar</a></td>
			</tr>";
		}
		mysqli_stmt_close($sentenciaPreparada);
		mysqli_close($conexion);
		return $archivos;
	}



	function ver($usuario) {
		$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");
		$sql = "SELECT ID, ARCHIVO, DATE_FORMAT(FECHA, '%D/%M/%Y'), TAMAGNO, PROPIETARIO FROM FILES WHERE PROPIETARIO = ?";
		$sentenciaPreparada = mysqli_prepare($conexion, $sql);
		mysqli_stmt_bind_param($sentenciaPreparada, 's', $usuario);
		mysqli_stmt_execute($sentenciaPreparada);
		mysqli_stmt_bind_result($sentenciaPreparada, $id, $file, $fecha, $tamagno, $propie);
		$archivos = "";
		while(mysqli_stmt_fetch($sentenciaPreparada)) {
			$archivos = $archivos."<tr>
			<td>$id</td>
			<td>$file</td>
			<td>$fecha</td>
			<td>$tamagno</td>
			<td>$propie</td>
			<td><a href='gestion.php?id=$id'>Descargar</a></td>
			</tr>";
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