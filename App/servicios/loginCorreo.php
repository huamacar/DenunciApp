<?php
	include 'Conexion.php';
	$CorreoUsuario = $_POST['Correo'];
	$Contrasena = $_POST['Contrasena'];
	$sql = "SELECT Codigo FROM Usuario WHERE Correo = '$CorreoUsuario' AND Contrasena = '$Contrasena'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "1" . $row["Codigo"];
    	}
	} else {
    	echo "0Las credenciales ingresadas no fueron encontradas. Por favor intente de nuevo.";
	}
	$conn->close();
?>