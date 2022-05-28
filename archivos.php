<?php

if (isset($_POST["subir"])) {

			$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");

			$fileName = $_FILES["newFile"]["name"];

			$destino = "uploads\\" . $fileName;

			$file = $_FILES['newFile']['tmp_name'];
			$size = $_FILES['newFile']['size'];
			$size = $size . "KB";

			$date = date('d/m/Y');

			$usuario = $_SESSION['usuario'];

            $nomOri = $_FILES["newFile"]["name"];

			if ($_FILES['newFile']['size'] > 1000000) {
				echo "El archivo es demasiado grande";
			} else {
				if (move_uploaded_file($file, $destino)) {
					$sql = "INSERT INTO FILES VALUES(NULL, ?, ?, ?, ?, ?)";
					$sentenciaPreparada = mysqli_prepare($conexion, $sql);
					if (!$conexion) {
						echo "Error en la conexion";
					} else {
					mysqli_stmt_bind_param($sentenciaPreparada, 'sssss', $fileName, $date, $size, $usuario, $nomOri);
					if (mysqli_stmt_execute($sentenciaPreparada)) {
						echo "El archivo se ha subido correctamente";
					} else {
						echo "El archivo no ha podido subirse";
					}
					mysqli_stmt_close($sentenciaPreparada);
					mysqli_close($conexion);
				}
				}
			}
		}
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");

	$sql = "SELECT ORIGINAL FROM FILES WHERE ID = ?";

	$descarga = mysqli_prepare($conexion, $sql);
	if (!$conexion) {
		echo "Error en la conexión";
	} else {
		mysqli_stmt_bind_param($descarga, 'i', $id);
		mysqli_stmt_execute($descarga);
		mysqli_stmt_bind_result($descarga, $nameFile);
		if (mysqli_stmt_fetch($descarga)) {
			$filePath = "uploads/" . $nameFile;
		}
		if (file_exists($filePath)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($filePath));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize('uploads/' . $nameFile));
			readfile('uploads/' . $nameFile);
		}
		mysqli_stmt_close($descarga);
		mysqli_close($conexion);

	}
}

if (isset($_GET['rm'])) {
    $rm = $_GET['rm'];

    $conexion = mysqli_connect("localhost", "pma", "pmapass", "safecloud");

    $sql = "SELECT ORIGINAL FROM FILES WHERE ID = ?";

    $eliminacion = mysqli_prepare($conexion, $sql);
    
    if (!$conexion) {
        echo "Error en la conexión";
    } else {
        mysqli_stmt_bind_param($eliminacion, 'i', $rm);
		mysqli_stmt_execute($eliminacion);
		mysqli_stmt_bind_result($eliminacion, $nameFile);
        if (mysqli_stmt_fetch($eliminacion)) {
            $filePath = "uploads/" . $nameFile;
        }
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
    mysqli_stmt_close($eliminacion);
	mysqli_close($conexion);

    $conexion2 = mysqli_connect("localhost", "pma", "pmapass", "safecloud");

    $sql2 = "DELETE FROM FILES WHERE ID = ?";

    $eliminar = mysqli_prepare($conexion2, $sql2);
    
    mysqli_stmt_bind_param($eliminar, 'i', $rm);
    mysqli_stmt_execute($eliminar);
    
    mysqli_stmt_close($eliminar);
    mysqli_close($conexion2);
}

?>

