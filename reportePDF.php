<?php

	include 'linegraph.php';
	require 'api/conexion.php';
	
	
	//Consulta
	$sql = "select * from (select id_graficos, valor_one, hora, fecha  from graficos order by id_graficos asc limit 200) t order by t.id_graficos ";
	$resultado = mysqli_query($conexion,$sql);

	$pdf = new PDF_LineGraph();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//$pdf->SetFillColor(232, 232, 232);
	//$pdf->SetFillColor(51, 178, 255);
	$pdf->SetFillColor(51, 255, 240);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(30);
	$pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'VALOR', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'HORA', 1, 0, 'C', 1);
	$pdf->Cell(40, 6, 'FECHA', 1, 1, 'C', 1);
	
	$pdf->SetFont('Arial','',10);
	
	while($rows = mysqli_fetch_array($resultado)){
			
		$pdf->SetX(30);
		$pdf->Cell(20, 6, $rows['id_graficos'], 1, 0, 'C');
		$pdf->Cell(40, 6, $rows['valor_one'], 1, 0, 'C');
		$pdf->Cell(40, 6, $rows['hora'], 1, 0, 'C');
		$pdf->Cell(40, 6, $rows['fecha'], 1, 1, 'C');
	
	}
	
	//----- graficas
	
	function obtenerData(){
		global $conexion;
		$valoresX=array();//horas
		$valoresY=array();//valores
	
		$sqli = "select * from (select id_graficos, valor_one, hora, fecha  from graficos order by id_graficos asc limit 5) t order by t.id_graficos ";
		$resultados = mysqli_query($conexion,$sqli); 
		while($row = mysqli_fetch_array($resultados)){
			$valoresX[] = $row['hora'];
			$valoresY[] =$row['valor_one'];
		}
		$arrayFinal = [$valoresX, $valoresY];
	
		return $arrayFinal;
	}

	$datosfinal = obtenerData();

	$i=0;
	$arr =array();
	for($i; $i<count($datosfinal[0]); $i++){
		$arr = array_merge($arr,array(strval($datosfinal[0][$i]) => intval($datosfinal[1][$i])));
	}

	$data = array(
		'DATA' => $arr,
	);

	$colors = array(
		'DATA' => array(114,171,237)
		//'Group 2' => array(163,36,153)
	);

	$pdf->AddPage();
// Display options: all (horizontal and vertical lines, 4 bounding boxes)
// Colors: fixed
// Max ordinate: 6
// Number of divisions: 3
	$pdf->LineGraph(190,120,$data,'VHkBvBgBdB',$colors,100,10);

	//$pdf->Output();
	$pdf->Output('D');  //Descargar PDF
	//$pdf->Output('D');  //Descargar PDF


?>