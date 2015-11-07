<?php
	include 'Conexion.php';
	$Departamento = $_POST['Departamento'];
	$sql = "SELECT Codigo,Nombre FROM Municipio WHERE Departamento = '$Departamento'";
	$result = $conn->query($sql);
	echo "<option disabled selected value='0'>Seleccione Municipio</option>";
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<option value='" .$row["Codigo"] . "'>".$row["Nombre"] . "</option>";
    	}
	}
$conn->close();
?>