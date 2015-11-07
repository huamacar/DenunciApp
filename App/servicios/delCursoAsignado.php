<?php
	include 'Conexion.php';
	$codCurso = $_POST['codCurso'];
	$usercode = $_POST['usercode'];
	
	$sql = "DELETE FROM AsignacionCursos WHERE Curso = '$codCurso' AND Estudiante = '$usercode'";
	
	if ($conn->query($sql) === TRUE) {
    	echo "1Curso Desasignado Correctamente<script>cargarDataAsignacionCursos()</script>";
	} else {
   	 	echo "0Error Imprevisto, contacte a info@coecys.org para desasignación manual";
	}
?>