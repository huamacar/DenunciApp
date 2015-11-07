<?php
	$cantidadNoticias = 1;
	$noticia = array(
		array('Oportunidad de Trabajo en',
			   'http://usac.edu.gt/',
			   'logo-usac.jpg',
			   'USAC: Universidad de San Carlos de Guatemala',
			   'Programador de Computación I',
			   'Facultad de Ciencias Jurídicas y Sociales USAC',
			   'Q.6,000.00 + Prestaciones de Ley + Bonificaciones',
			   'Lunes a Viernes de 11:00 a 19:00 horas',
			   'Requisitos-para-programador.pdf'
			   )
	);
	echo "<h3>Noticias</h3>";
	for($i = 0; $i < $cantidadNoticias; $i++){
		echo "<div class='noticia'>";
        	echo "<h4>".$noticia[$i][0]."</h4>";
			echo "<a href='".$noticia[$i][1]."' target='_blank'><img src='img/patrocinadores/".$noticia[$i][2]."' class='grow' width='200' data-toggle='popover' data-placement='top' data-content='".$noticia[$i][3]."'></a>";
            echo "<h4><u>".$noticia[$i][4]."</u></h4>";
            echo "<h4><b>Lugar: </b>".$noticia[$i][5]."</h4>";
            echo "<h4><b>Salario: </b>".$noticia[$i][6]."</h4>";
            echo "<h4><b>Horario: </b>".$noticia[$i][7]."</h4>";
            echo "<input type='button' class='btn btn-primary' value='Ver Más >>' onClick=\"verNoticia('".$noticia[$i][8]."');\">";     
            echo "</div>";
	}
?>