<?php
	include 'Conexion.php';
	$codCurso = $_POST['codCurso'];
	$seccion = $_POST['seccion'];
	$usercode = $_POST['usercode'];
	
	$sql = "INSERT INTO AsignacionCursos(Estudiante,Curso,Seccion) VALUES('$usercode','$codCurso','$seccion')";
	if ($conn->query($sql) === TRUE) {
    	echo "1Curso Asignado Correctamente<script>cargarDataAsignacionCursos()</script>";
	} else {
   	 	echo "0Error: El Curso ya había sido asignado previamente";
	}
?>