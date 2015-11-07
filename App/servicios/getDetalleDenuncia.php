<?php
	include ('Conexion.php');
	$codDenuncia = $_POST['codDenuncia'];
	$sql = "SELECT * FROM Denuncia where iddenuncia = " . $codDenuncia;
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo "<h1><b>Detalle de Denuncia</b></h1>";
        echo "<img src='img/". $row["ubicacion"] . "' width='200' height='200'>";
        echo "<h1>" . $row["titulo"] . "</h1>";
		echo "<h3>Fecha publicacion: " . $row["fecha"] . "</h3>";
        echo "<h3>Descripción</h3>";
        echo "<p>" . $row["descripcion"]. "</p>";
	}
?>