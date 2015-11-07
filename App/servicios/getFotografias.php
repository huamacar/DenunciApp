<?php
	$cantidadFotografias = 38;
	$fotografias = array(
			array('1','Perspectiva desde un dron en la demostración de drones de COECYS, gracias a El Duende'),
			array('2','Game Day, 2 estaciones de juegos xbox gracias a El Duende'),
			array('3','Demostracion de Drones gracias a El Duende'),
			array('4','Entrega de reconocimiento a expositor en la conferencia de seguridad de ESET'),
			array('5','Conferencia de Seguridad informática impartida por la empresa de seguridad ESET'),
			array('6','Conferencia de Seguridad informática, gracias a ESET'),
			array('7','Pre-Conferencia de Inteligencia de Negocios con la herramienta Tableau'),
			array('8','Demostración de Dashboards con la herramienta Tableau en la inteligencia de Negocios'),
			array('9','Pre-Conferencia sobre el framework de AngularJS'),
			array('10','Demostración del uso del framework AngularJS en una aplicación práctica'),
			array('11','Codificación de Aplicaciones AngularJS'),
			array('12','Ganador del segundo lugar en la primera rifa de COECYS, una usb de 16 GB.'),
			array('13','Premios de los ganadores de la primera rifa de COECYS, una usb de 16 GB y una entrada al EMF 2015'),
			array('14','Ganadora del primer lugar de la primera rifa de COEYCS, una entrada pases dobles al EMF 2015'),
			array('15','WI-DAY nuestro día de juegos donde se juega smash bros, el que gana sigue jugando gratis'),
			array('16','Primer Campeonato de fútbol de COECYS, agradecemos a todos los participantes'),
			array('17','Tema de COECYS 2015, ingeniería no es solo programar, hay muchas más aplicaciones.'),
			array('18','Asamblea General de COECYS 2015'),
			array('19','Asamblea General de COECYS 2015'),
			array('20','Asamblea General de COECYS 2015'),
			array('21','Asamblea General de COECYS 2015'),
			array('22','Director de Escuale: Ing. Marlon Pérez Turk'),
			array('23','Junta directiva COECYS 2015'),
			array('24','Colaboradores COECYS 2015'),
			array('25','Tema de COECYS 2015'),
			array('26','Lugar de las Conferencias'),
			array('27','Horario y fecha de COECYS XV'),
			array('28','Conferencia de almacenamiento cuántico'),
			array('29','Nuestros patrocinadores'),
			array('30','Unviersidades Invitadas'),
			array('31','Invitado Especial: Jaime Viñals'),
			array('32','Reconocimiento a Jaime Viñals'),
			array('33','Precio de COECYS 2015'),
			array('34','Audiencia de COECYS 2015'),
			array('35','Audiencia de COECYS 2015'),
			array('36','Audiencia de COECYS 2015'),
			array('37','Audiencia de COECYS 2015'),
			array('38','Junta Directiva y Colaboradores')
		);
	echo "<h1><b>Galería Fotográfica</b></h1>";
	echo "<div class='row centrado'>";
	echo "<h1>Asamblea de COECYS 2015</h1>";
	for($i = 18; $i < $cantidadFotografias; $i++){
		echo "<div class='col-lg-2 fotoGaleria'>";
        	echo "<img src='galeria/mini/".$fotografias[$i][0].".jpg' width='210' height='210' onclick='verFotografia(".$fotografias[$i][0].",\"".$fotografias[$i][1]."\");'>";
        echo "</div>";
	}
	echo "</div>";
	echo "<div class='row centrado'>";
	echo "<h1>Primeras Actividades del Congreso</h1>";
	for($i = 0; $i < 18; $i++){
		echo "<div class='col-lg-2 fotoGaleria'>";
        	echo "<img src='galeria/mini/".$fotografias[$i][0].".jpg' width='210' height='210' onclick='verFotografia(".$fotografias[$i][0].",\"".$fotografias[$i][1]."\");'>";
        echo "</div>";
	}
	echo "</div>";
?>