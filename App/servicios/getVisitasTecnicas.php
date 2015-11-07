<?php
	include 'Conexion.php';
	$sql = "SELECT Codigo,Empresa,LogoEmpresa,Descripcion,Cupo,Fecha,Hora,Disponibles,Encargados FROM VisitaTecnica ORDER BY Empresa";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			echo "<div class='visitaTecnica' id=" . $row["Codigo"] . "'>";
			echo "<h3><b>Empresa " . $row['Empresa'] . "</b></h3>";
			echo "<img src='img/patrocinadores/" . $row['LogoEmpresa'] . "' width='100'>";
			echo "<p>" . $row['Descripcion'] . "</p>";
			echo "<h4><b>Cupo:</b> " . $row['Cupo'] . " Participantes</h4>";
			echo "<h4><b>Fecha:</b> " . $row['Fecha'] . "</h4>";
			echo "<h4><b>Hora :</b> " . $row['Hora'] . "</h4>";
			echo "<h2>" . $row['Disponibles'] . " disponibles</h2>";
			echo "<input type='button' value='Asignarse a Visita Técnica' class='btn btn-primary' onclick=\"asignarVisita('". $row['Codigo'] . "')\">";
			echo "<h4>Encargados</h4>";
			echo "<p>" . $row['Encargados'] . "</p>";
			echo "</div>";
    	}
	}
$conn->close();
?>