<!DOCTYPE html>
<html>
<head>
	<title>Graficas For Logo</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.4.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
	<link href="css/popup.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">
		$(document).ready(function(){
	    	$('#button1').click(function(){
	       		$("#contenedor").load("lineal5.php");
	    	});
		});
	</script>
	
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
							<center style="font-weight: bold; font-size: 30px;">Gr&aacuteficas For Logo</center>
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal"></div>
								<span><a href="#popup"><button id="button1" style="background: #009efb; color: white;" >Ver Completo</button></a></span>
								<span><a href="http://186.101.252.206:8480/graficasForLogo/reportePDF.php"><button id="button2" style="background: #009efb; color: white;" >Download PDF</button></a></span>
								<span><a href="http://186.101.252.206:8480/graficasForLogo/excel2.php"><button id="button1" style="background: #009efb; color: white;" >Download Excel</button></a></span>
							</div>
							<div class="col-sm-6">
								<div id="cargaLineal2"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal3"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaLineal4"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	 <div id="popup" class="overlay">
            <div id="popupBody">
                <center><h2>Pantalla Completa</h2></center>
                <a id="cerrar" href="#">&times;</a>
                <div class="popupContent" id="contenedor">
                </div>
            </div>
        </div>

</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
		$('#cargaLineal2').load('lineal2.php');
		$('#cargaLineal3').load('lineal3.php');
		$('#cargaLineal4').load('lineal4.php');
	});
</script>