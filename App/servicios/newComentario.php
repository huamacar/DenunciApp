<?php
	include ('Conexion.php');
	$comentario = $_POST['comentario'];
	$codDenuncia = $_POST['codDenuncia'];
	$codUsuario = $_POST['codUsuario'];
	
	$sql = "INSERT INTO `denuncia_comentario`(`comentario`, `fk_iddenuncia`, `fk_idusuario`) VALUES ('" 
	. $comentario . "','" . $codDenuncia . "','" . $codUsuario . "')";

	$conn->set_charset("utf8");
	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
		echo "1";
		echo "Comentario Registrado Exitosamente";
	}else{
		echo "0";
		echo "Error al insertar Comentario";

	}
?>