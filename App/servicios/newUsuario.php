<?php
	include ('Conexion.php');
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$nickname = $_POST['nickname'];
	$password = $_POST['password'];
	$about = $_POST['about'];
	$FotoPerfil = $_POST['fotoPerfil'];

	$sql = "select * from usuario where email= '" . $correo .  "'";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
		echo "0";
		echo "El correo que desea registrar ya existe";
	}	else{

	$sql = "INSERT INTO `usuario`(`email`, `nickname`, `pass`, `nombre`, `apellido`, `fotoperfil`, `bio`) VALUES ('" 
	. $correo . "','" . $nickname . "','" . $password . "','" . $nombres . "','" . $apellidos . "','" . $FotoPerfil . "','" . $about . "')";

	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	$sql = "select * from usuario where email = '" . $correo . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		rename("../uploads/". $FotoPerfil , "../uploads/u" . $row["idusuario"] . ".jpg");
		$sql = "UPDATE usuario SET fotoperfil='u" . $row["idusuario"] . ".jpg'" . " WHERE email = '" . $correo . "'";
		$conn->set_charset("utf8");
		$result = $conn->query($sql);
		echo "1";
		echo "Usuario Registrado Exitosamente";
	}else{
		echo "0";
		echo "Error al insertar usuario";

	}
}
?>