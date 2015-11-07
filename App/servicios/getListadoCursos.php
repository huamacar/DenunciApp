<?php
	include 'Conexion.php';
	$sql = "SELECT Codigo,Nombre FROM Curso";
	$result = $conn->query($sql);
	echo "<option disabled value='0' selected>Seleccione un Curso</option>";
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<option value='" .$row["Codigo"] . "'>".$row["Nombre"] . "</option>";
    	}
	}
	$conn->close();
?>