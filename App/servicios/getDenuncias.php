<?php
	include ('Conexion.php');
	$sql = "SELECT * FROM Denuncia";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			
			echo "<div class='col-lg-4 col-md-4 col-xs-6 denuncia'>";
            echo "<img src='img/" . $row["ubicacion"] . "' class='img-circle' width='100' height='100'>";
            echo "<h3>" . $row["titulo"] . "</h3>";
            echo "<h4>" . $row["fecha"] . "</h4>";
            echo "<h4>" . $row["valoracion"] . "</h4>";

            echo "<input type='button' class='btn btn-primary' value='Ver Detalles' onClick='getDetalleDenuncia(". $row["iddenuncia"] .")'>";

            echo "<input type='button' class='btn btn-primary' value='Ver Detalles'>";

            echo "</div>";
    	}
	}
?>