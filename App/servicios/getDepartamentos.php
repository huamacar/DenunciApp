<?php
	include 'Conexion.php';
	$sql = "SELECT Codigo,Nombre FROM Departamento";
	$result = $conn->query($sql);
	echo "<option disabled selected value='0'>Seleccione un Departamento</option>";
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<option value='" .$row["Codigo"] . "'>".$row["Nombre"] . "</option>";
    	}
	}
$conn->close();
?>