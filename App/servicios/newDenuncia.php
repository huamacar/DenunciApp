<?php
	include ('Conexion.php');
	$titulo = $_POST['titulo'];
	$desc = $_POST['descripcion'];
	$fecha = $_POST['fecha'];
	$usuario = $_POST['usuario'];
	$foto = $_POST['fotografia'];

	$sql = "INSERT INTO `denuncia`(`titulo`, `descripcion`, `fecha`, `fk_idusuario`, `ubicacion`) VALUES ('" 
	. $titulo . "','" . $desc . "','" . $fecha . "','" . $usuario . "','" . $foto . "')";

	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	$sql = "SELECT MAX(iddenuncia) AS id FROM denuncia";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		rename("../uploads/". $foto , "../uploads/d" . $row["id"] . ".jpg");
		$sql = "UPDATE denuncia SET ubicacion ='d" . $row["id"] . ".jpg'" . " WHERE iddenuncia = '" . $row["id"] . "'";
		$conn->set_charset("utf8");
		$result = $conn->query($sql);
		echo "1";
		echo "Denuncia Registrada Exitosamente";
	}else{
		echo "0";
		echo "Error al insertar Denuncia";

	}
?>