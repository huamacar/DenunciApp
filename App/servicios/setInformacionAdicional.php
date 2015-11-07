<?php
	include 'Conexion.php';
	$Genero = $_POST['Genero'];
	$Autoidentificacion = $_POST['Autoidentificacion'];
	$Municipio = $_POST['Municipio'];
	$Institucion = $_POST['Institucion'];
	$Sector = $_POST['Sector'];
	$TelefonoCasa = $_POST['TelefonoCasa'];
	$TelefonoCelular = $_POST['TelefonoCelular'];
	$CodigoUsuario = $_POST['usercode'];
	
	$sql = "UPDATE Usuario SET Genero = '$Genero',Autoidentificacion = '$Autoidentificacion',Municipio='$Municipio',Institucion='$Institucion',Sector='$Sector',TelefonoCasa='$TelefonoCasa',TelefonoMovil='$TelefonoCelular' WHERE Codigo='$CodigoUsuario';";
	
	if ($conn->query($sql) === TRUE) {
    	echo "1Datos Actualizados Correctamente";
	} else {
   	 	echo "0Error: Datos repetidos, contacte a info@coecys.org para actualización manual.";
	}
?>