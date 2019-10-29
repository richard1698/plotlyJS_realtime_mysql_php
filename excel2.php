<?php
	//Incluimos librería y archivo de conexión
	require 'librerias/PHPExcel/Classes/PHPExcel.php';
	include 'api/conexion.php';
	
	//Consulta
	$sql = "select * from (select id_graficos, valor_one, hora, fecha  from graficos order by id_graficos desc limit 200) t order by t.id_graficos ";
	$resultado = mysqli_query($conexion,$sql); 
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('imagenes/plotly2.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Richard Garcia")->setDescription("Reporte de Data Ethernet Arduino");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("EthernetData");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:D4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:D6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORT DATA ARDUINO ');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'ID');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'DATA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'HORA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'FECHA');
	
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = mysqli_fetch_array($resultado)){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['id_graficos']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['valor_one']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['hora']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['fecha']);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:D".$fila);
	
	//$filaGrafica = $fila+2;
	
	
	//------------------------------------------------------------
	
	
		$dataseriesLabels = array( 
						new PHPExcel_Chart_DataSeriesValues('String', 'EthernetData!$B$6', NULL, 1)
					); 
					
	$xAxisTickValues = array( new PHPExcel_Chart_DataSeriesValues('String', 'EthernetData!$C$7:$C$'.$fila, NULL, $fila-6) ); // Q1 to Q4 ); // Regional data set mapping 
	
	// Construct the data series dataseries 
	$dataSeriesValues = array( 
						new PHPExcel_Chart_DataSeriesValues('Number', 'EthernetData!$B$7:$B$'.$fila, NULL, $fila-6)
					); 
 
	// plotType
	$series = new PHPExcel_Chart_DataSeries ( 
						PHPExcel_Chart_DataSeries::TYPE_LINECHART,  
						PHPExcel_Chart_DataSeries::GROUPING_STACKED, 
						range(0, count($dataSeriesValues)-1), 
						$dataseriesLabels, 
						$xAxisTickValues, 
						$dataSeriesValues 
				); // A map of regional distribution to the data series 
	
	
	$plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series)); // Set the chart legend 
 
	$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_TOPRIGHT, NULL, false); // Set graphic title
 
	$title = new PHPExcel_Chart_Title('Data Arduino Line Chart'); // Set upYThe axis labels 
 
	$yAxisLabel = new PHPExcel_Chart_Title('Valores Y'); // Create graphics 
 
	$chart = new PHPExcel_Chart( 'chart1', $title, $legend, $plotarea, true, 0, NULL, NULL ); // Set the graphics area 
 
	$chart->setTopLeftPosition('B'.($fila+3)); $chart->setBottomRightPosition('H'.($fila+18)); // Graphics will be added to the current worksheet 
	
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
	
	//-----------------------------------------------------------
	
	// definir origen de los valores
	/*$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$B$7:$B$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$C$7:$C$'.$fila);
	
	// definir  gráfico
	$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
	PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
	array(0),
	array(),
	array($categories), // rótulos das columnas
	array($values) // valores
	);
	$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
	
	// inicializar gráfico
	$layout = new PHPExcel_Chart_Layout();
	$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
	
	// inicializar o gráfico
	$chart = new PHPExcel_Chart('exemplo', null, null, $plotarea);
	
	// definir título do gráfico
	$title = new PHPExcel_Chart_Title(null, $layout);
	$title->setCaption('Gráfico PHPExcel Chart Class');
	
	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('B'.$filaGrafica);
	$filaFinal = $filaGrafica + 10;
	$chart->setBottomRightPosition('E'.$filaFinal);
	$chart->setTitle($title);
	*/
	
	
	//---------------------------------------------------------
	
	
	// adicionar o gráfico à folha
	//$objPHPExcel->getActiveSheet()->addChart($chart);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>
