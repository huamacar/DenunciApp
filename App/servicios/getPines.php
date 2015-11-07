<?php
	include 'Conexion.php';
	$sql = "SELECT Codigo,PIN FROM Usuario ORDER BY Codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0 && 1==1) {
    	while($row = $result->fetch_assoc()) {
        	echo "<div>Numero: " . $row["Codigo"]. "<br>PIN: " . $row["PIN"] . "<br><br>";
    	}
	} else {
    	echo "0 results";
	}
$conn->close();
?>