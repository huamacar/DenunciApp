<?php
	include 'Conexion.php';
	$Nombres = $_POST['Nombres'];
	$Apellidos = $_POST['Apellidos'];
	$FechaNacimiento = $_POST['FechaNacimiento'];
	$Universidad = $_POST['Universidad'];
	$Correo = $_POST['Correo'];
	$Contrasena = $_POST['Contrasena'];
	$Carnet = $_POST['Carnet'];
	$TiempoCierre = $_POST['TiempoCierre'];
	$CantidadCursosCierre = $_POST['CantidadCursosCierre'];
	$ExperienciaLaboral = $_POST['ExperienciaLaboral'];
	$Recibo = $_POST['Recibo'];
	$DPI = $_POST['DPI'];
	$CodigoUsuario = $_POST['usercode'];
	
	$sql = "UPDATE Usuario SET Nombres = '$Nombres',Apellidos = '$Apellidos',FechaNacimiento='$FechaNacimiento',Universidad='$Universidad',Correo='$Correo',Contrasena='$Contrasena',Carnet='$Carnet',TiempoCierre='$TiempoCierre',CantidadCursosCierre='$CantidadCursosCierre',ExperienciaLaboral='$ExperienciaLaboral',Recibo='$Recibo',DPI='$DPI' WHERE Codigo='$CodigoUsuario';";
	
	if ($conn->query($sql) === TRUE) {
    	echo "1Datos Actualizados Correctamente";
	} else {
   	 	echo "0Error: Datos repetidos, contacte a info@coecys.org para actualización manual.";
	}
?>