<?php
	include 'Conexion.php';
	$usercode = $_POST['usercode'];
	$sql = "SELECT C.Codigo Codigo,C.Nombre Nombre,A.Seccion Seccion FROM AsignacionCursos A INNER JOIN Curso C ON A.Curso = C.Codigo WHERE A.Estudiante = '$usercode'";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<option value='" . $row["Codigo"] . "'>" . $row["Nombre"] . " Sección " . $row["Seccion"] . "</option>";
    	}
	}
	$conn->close();
?>