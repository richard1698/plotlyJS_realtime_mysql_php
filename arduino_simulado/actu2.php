<?php

	include 'api/conexion.php';
	date_default_timezone_set('America/Guayaquil');
	
	$sql2 = "SELECT valor, hora FROM graficos";
	$result = mysqli_query($conexion,$sql2);
	
	$valor = $_POST['valor'];
	$hora_actual = date('H:i:s');
	$fecha_actual = date('d-m-Y');
	
	$sql = "INSERT INTO graficos (valor, hora, fecha) VALUES ('$valor', '$hora_actual', '$fecha_actual')";
	$result = $link->prepare($sql);
	$result->execute();

$variable=date("Y-m-d H:i:s");

echo '<p>'.$variable.'</p>';

?>