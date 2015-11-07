<?php
	include 'Conexion.php';
	$VisitaTecnica = $_POST['codigoVisita'];
	$CodigoUsuario = $_POST['usercode'];
	
	$sql = "SELECT Codigo FROM Usuario WHERE Codigo = '$CodigoUsuario' AND VisitaTecnicaAsignada IS NOT NULL;";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	
	$visita_asignada = "N";
	
	if ($result->num_rows == 0) {	//No se ha asignado ninguna visita tecnica
		$sql = "SELECT Disponibles FROM VisitaTecnica WHERE Codigo = '$VisitaTecnica';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$row = $result->fetch_assoc();
			if($row['Disponibles'] > 0){
				//Hay espacio para la visita	
				$sql = "UPDATE Usuario SET VisitaTecnicaAsignada = '$VisitaTecnica' WHERE Codigo = '$CodigoUsuario'";
				if ($conn->query($sql) === TRUE) {
					echo "1Visita Técnica Asignada Correctamente<script>$('#seccionAsignarVisitas').fadeOut('fast');</script>";
					
					$sql = "SELECT (Disponibles - 1) Disponibles FROM VisitaTecnica WHERE Codigo = '$VisitaTecnica'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$valorDescontado = $row['Disponibles'];
					
					$sql = "UPDATE VisitaTecnica SET Disponibles = '$valorDescontado' WHERE Codigo = '$VisitaTecnica'";
					$visita_asignada = "S";
					$conn->query($sql);
				} else {
					echo "0Problema No Previsto, contacte con info@coecys.org";
				}
			}else{
				echo "0No hay mas espacio para la visita técnica";
				$visita_asignada = "S";
			}
		}else{
			echo "0Error No Previsto, contacte con info@coecys.org";	
		}
	}else{
		//echo "0Ya tiene asignada una visita técnica, no puede cambiar esta opción";
		$sql = "SELECT Codigo FROM Usuario WHERE Codigo = '$CodigoUsuario' AND SegundaVisitaTecnicaAsignada IS NOT NULL;";
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {	//La segunda visita técnica está libre
			$sql = "SELECT Disponibles FROM VisitaTecnica WHERE Codigo = '$VisitaTecnica';";
			$result = $conn->query($sql);	
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				if($row['Disponibles'] > 0){
					//Aún hay espacio en la visita técnica
					$sql = "UPDATE Usuario SET SegundaVisitaTecnicaAsignada = '$VisitaTecnica' WHERE Codigo = '$CodigoUsuario'";
					if ($conn->query($sql) === TRUE) {
						echo "1Segunda Visita Técnica Asignada Correctamente<script>$('#seccionAsignarVisitas').fadeOut('fast');</script>";
						
						$sql = "SELECT (Disponibles - 1) Disponibles FROM VisitaTecnica WHERE Codigo = '$VisitaTecnica'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$valorDescontado = $row['Disponibles'];
						
						$sql = "UPDATE VisitaTecnica SET Disponibles = '$valorDescontado' WHERE Codigo = '$VisitaTecnica'";
						$visita_asignada = "S";
						$conn->query($sql);
					}
				}else{
					echo "0No hay mas espacio para la visita técnica";
				}
			}
		}else{
			echo "0Ya tiene asignadas 2 visitas técnicas, no puede cambiar esta opción";
		}
	}
	
	$conn->close();
?>