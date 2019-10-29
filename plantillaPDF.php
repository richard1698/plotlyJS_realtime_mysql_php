<?php
	
	require 'librerias/FPDF/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header(){
			$this->Image('imagenes/plotly2.png', 4, 4, 30);
			$this->SetFont('Arial', 'B', 15);
			$this->Cell(40);
			$this->Cell(120, 10, 'Report of Data Ethernet Arduino', 0, 0, 'C');
			$this->Ln(25);
		}
		
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
		}
		
	}

?>