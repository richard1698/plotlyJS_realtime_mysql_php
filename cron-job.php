
<?php
	
	date_default_timezone_set('America/Guayaquil');
	include "ip_config.php";
	$hora_actual = date('H:i:s');
	$fecha_actual = date('d-m-Y');
	
	//echo $fecha_actual;
	
	$fechaFinal = explode("-",strval($fecha_actual));
	
	//echo '<br>';
	//echo $fechaFinal[0];
	
	if( $fechaFinal[0] == "10") {
		file_get_contents("http://localhost:8480/graficasForLogo/reportePDF.php");
		file_get_contents("http://localhost:8480/graficasForLogo/excel2.php");
		include "correo.php";
	}


?>