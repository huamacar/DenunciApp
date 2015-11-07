<?php
	include 'Conexion.php';
	$PinUsuario = $_POST['Pin'];
	$sql = "SELECT Codigo FROM Usuario WHERE PIN = '$PinUsuario'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "1" . $row["Codigo"];
    	}
	} else {
    	echo "0PIN Incorrecto";
	}
$conn->close();
?>