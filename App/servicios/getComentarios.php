<?php
	include ('Conexion.php');
	$codDenuncia = $_POST['codDenuncia'];
	$sql = "SELECT DC.comentario Comentario, DC.iddenunciacomentario IdComentario, U.nickname Nickname, U.idusuario IdUser FROM Denuncia D, denuncia_comentario DC, usuario U WHERE D.iddenuncia = DC.fk_iddenuncia AND DC.fk_idusuario = U.idusuario AND D.iddenuncia = " . $codDenuncia;
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		echo "<div class='row>";
		echo "<div class='col-lg-4 col-md-4 col-xs-4'><img src='uploads/u" . $row['IdUser'] . ".jpg' width='100' heigth='100'></div>";
		echo "<div class='col-lg-8 col-md-8 col-xs-8'>";
		echo "<h4>" . $row['Comentario'] .  "</h4>";
		echo "</div>";
		echo "</div>";
	}
	}
?>