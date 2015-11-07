<?php
	include ('Conexion.php');
	$sql = "SELECT nombre FROM usuario";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<div>" . $row["nombre"] . "</div>";
    	}
	}
?>