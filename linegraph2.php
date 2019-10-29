<?php
require('linegraph.php');
include 'api/conexion.php';




$pdf2 = new PDF_LineGraph();
$pdf2->SetFont('Arial','',7);

function obtenerData(){
	global $conexion;
	$valoresX=array();//horas
	$valoresY=array();//valores
	
	$sqli = "select * from (select id_graficos, valor_one, hora, fecha  from graficos order by id_graficos asc limit 5) t order by t.id_graficos ";
	$resultados = mysqli_query($conexion,$sqli); 
	while($row = mysqli_fetch_array($resultados)){
			$valoresX[] = $row['hora'];
			$valoresY[] =$row['valor'];
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
	'Group 1' => $arr,
);

$colors = array(
    'Group 1' => array(114,171,237)
    //'Group 2' => array(163,36,153)
);

$pdf2->AddPage();
// Display options: all (horizontal and vertical lines, 4 bounding boxes)
// Colors: fixed
// Max ordinate: 6
// Number of divisions: 3
$pdf2->LineGraph(190,120,$data,'VHkBvBgBdB',$colors,100,10);

/*$pdf->AddPage();
// Display options: horizontal lines, bounding box around the abscissa values
// Colors: random
// Max ordinate: auto
// Number of divisions: default
$pdf->LineGraph(190,100,$data,'HvB');

$pdf->AddPage();
// Display options: vertical lines, bounding box around the legend
// Colors: random
// Max ordinate: auto
// Number of divisions: default
$pdf->LineGraph(190,100,$data,'VkB');

$pdf->AddPage();
// Display options: horizontal lines, bounding boxes around the plotting area and the entire area
// Colors: random
// Max ordinate: 20
// Number of divisions: 10
$pdf->LineGraph(190,100,$data,'HgBdB',null,20,10);*/

$pdf2->Output();
?>