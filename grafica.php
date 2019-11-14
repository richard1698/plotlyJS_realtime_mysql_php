<?php
	include_once 'api/user.php';
	include_once 'api/userSesion.php';
	
	
	if(isset($_SESSION)){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Graficas For Logo</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.4.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
	<link href="css/popup.css" rel="stylesheet" type="text/css" />
	<link href="css/popupDatapicker.css" rel="stylesheet" type="text/css" />
	<link href="css/stylesGraphics.css" rel="stylesheet" type="text/css" />
	<link href="librerias/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<script src="librerias/daterangepicker/daterangepicker.js"></script>
	<script src="librerias/daterangepicker/moment.min.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function(){
	    	/*$('#button1').click(function(){
	       		$("#contenedor").load("lineal5.php");
	    	});
			
			$('#button2').click(function(){
	       		$("#contenedor2").load("dataPicker.php");
	    	});*/
			$("#contenedor-padre").load("graphicsAll.php");
			
			$('#editoUsuario').click(function(){
	       		$("#contenedor-padre").load("editUser.php?correo=<?php echo $user->getUserAll()[4]; ?>");
	    	});
			
			$('#home').click(function(){
	       		$("#contenedor-padre").load("graphicsAll.php");
	    	});
			
		});
	</script>
	
</head>

<body>
	
	<nav class="navbar">
		<div class="title-navbar"> Gr&aacuteficas For Logo </div>
		<div class="logo-image">
            <img src="<?php echo $user->getUserImg(); ?>" class="img-size">
			<div class="dropdown-content">
				<a id="home" >Home Page</a>
				<a id="editoUsuario" >Edit User</a>
				<a href="api/logout.php">Logout</a>
			</div>
      </div>
	  <div class="nombre-usuario"> <?php echo $user->getUser(); ?>  </div>
	</nav>
	
	<!--  style="background: #009efb; color: white;" 
		<span><a href="http://186.101.252.206:8480/graficasForLogo/reportePDF.php"><button id="button2" class="btn btn-primary btn-lg btn-inline" > <span class="glyphicon glyphicon-download"></span>Download PDF</button></a></span>
		<span><a href="http://186.101.252.206:8480/graficasForLogo/excel2.php"><button id="button3" class="btn btn-primary btn-lg btn-inline" >Download Excel</button></a></span>
	-->
	<div id="contenedor-padre" style="margin-top:80px;">
	<!--<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
							<center style="font-weight: bold; font-size: 30px;"> Charts of Arduino </center>
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal"></div>
								<div style="text-align: center">
									<span><a href="#popup"><button id="button1" class="btn btn-primary btn-info btn-inline">Ver Completo <span class="glyphicon glyphicon-search"></span></button></a></span>
									<span><a href="#popup2"><button id="button2" class="btn btn-primary btn-info btn-inline" >Download Report <span class="glyphicon glyphicon-download"></span></button></a></span>
								</div>
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
	</div>-->
	</div>
								
	
	<!--<div id="popup" class="overlay">
        <div id="popupBody">
			<center><h2>Pantalla Completa</h2></center>
			<a id="cerrar" href="#">&times;</a>
			<div class="popupContent" id="contenedor">
            </div>
        </div>
    </div>
	
	<div id="popup2" class="overlay">
        <div class="popupBody2">
			<center><h2>Download Report</h2></center>
			<a class="cerrar2" href="#">&times;</a>
			<div class="popupContent" id="contenedor2">
            </div>
        </div>
    </div>-->

</body>
</html>


<!--<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
		$('#cargaLineal2').load('lineal2.php');
		$('#cargaLineal3').load('lineal3.php');
		$('#cargaLineal4').load('lineal4.php');
	});
</script>-->

<?php
	} else {
		header("location: index.php");
	}
	

?>