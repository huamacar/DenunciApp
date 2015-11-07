<?php
	include 'Conexion.php';
	$usercode = $_POST['usercode'];
	$sql = "SELECT USU.Nombres Nombres, USU.Apellidos Apellidos, UNI.Nombre Universidad FROM Usuario USU INNER JOIN Universidad UNI ON USU.Universidad = UNI.Codigo WHERE USU.Codigo = $usercode";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	$row = $result->fetch_assoc();
		echo "<h1>Participante</h1>";
        echo "<h3>" . $row["Nombres"] . " " . $row["Apellidos"] . "</h3>";
		echo "<h3>" . $row["Universidad"] . "</h3>";
	}
	$sql = "SELECT VT.Empresa Empresa, VT.LogoEmpresa LogoEmpresa, VT.Descripcion Descripcion, VT.Fecha Fecha, VT.Hora Hora FROM Usuario U INNER JOIN VisitaTecnica VT ON U.VisitaTecnicaAsignada = VT.Codigo WHERE U.Codigo = $usercode";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		echo "<h4><b>Visita Técnica Asignada</b></h4>";
		echo "<h4>" . $row["Empresa"] . "</h4>";
		echo "<img src='img/patrocinadores/" . $row["LogoEmpresa"] . "' width='50'/><br>";
		echo "<h4>" . $row["Descripcion"] . "</h4>";
		echo "<h4>Fecha: " . $row["Fecha"] . "</br>";
		echo "<h4>Hora: " . $row["Hora"] . "</h4>";
	}
	$sql = "SELECT VT.Empresa Empresa, VT.LogoEmpresa LogoEmpresa, VT.Descripcion Descripcion, VT.Fecha Fecha, VT.Hora Hora FROM Usuario U INNER JOIN VisitaTecnica VT ON U.SegundaVisitaTecnicaAsignada = VT.Codigo WHERE U.Codigo = $usercode";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		echo "<h4><b>Visita Técnica Asignada</b></h4>";
		echo "<h4>" . $row["Empresa"] . "</h4>";
		echo "<img src='img/patrocinadores/" . $row["LogoEmpresa"] . "' width='50'/><br>";
		echo "<h4>" . $row["Descripcion"] . "</h4>";
		echo "<h4>Fecha: " . $row["Fecha"] . "</br>";
		echo "<h4>Hora: " . $row["Hora"] . "</h4>";
	}
$conn->close();
?>
	<input type='button' value='Cerrar Sesión' onclick='cerrarSesion()' />