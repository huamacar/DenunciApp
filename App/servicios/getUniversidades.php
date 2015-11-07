<?php
	include 'Conexion.php';
	$PaisUsuario = $_POST['Pais'];
	$sql = "SELECT Codigo,Nombre FROM Universidad WHERE Pais = '$PaisUsuario'";
	$result = $conn->query($sql);
	echo "<option disabled selected>Seleccione Universidad</option>";
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<option value='" .$row["Codigo"] . "'>".$row["Nombre"] . "</option>";
    	}
	}
$conn->close();
?>