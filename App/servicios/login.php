<?php
	include ('Conexion.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM usuario where email = '" . $email . "'";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		if($password == $row["pass"]){
			echo "1" . $row["idusuario"];			
		}else{
			echo "0Contraseña Incorrecta";			
		}
	}else{
		echo "Usuario no Existe";
	}
?>