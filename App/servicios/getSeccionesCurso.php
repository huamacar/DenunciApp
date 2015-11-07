<?php
	include 'Conexion.php';
	$codigoCurso = $_POST['codigoCurso'];
	$sql = "SELECT Seccion FROM Seccion WHERE Curso = '$codigoCurso'";
	$result = $conn->query($sql);
	echo "<option disabled value='0' selected>Seleccione una Sección</option>";
	$conn->set_charset("utf8");

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<option value='" .$row["Seccion"] . "'>".$row["Seccion"] . "</option>";
    	}
	}
	$conn->close();
?>