<?php
	include ('Conexion.php');
	$sql = "SELECT * FROM Categoria";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	echo "<option disabled value='0'>Seleccione una Categoria</option>";
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			echo "<option value='" . $row['idcategoria'] . "'>" . $row['Nombre'] . "</option>";
    	}
	}
?>