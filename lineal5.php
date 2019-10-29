
<?php
	
	require_once "api/conexion.php";
	
	function update(){
		global $conexion;
		//$sql = "select valor, hora from graficos order by id_graficos desc limit 10 ";
		$sql = "select * from (select valor_one, hora, id_graficos from graficos order by id_graficos desc limit 10) t order by t.id_graficos ";
		$result = mysqli_query($conexion,$sql);
		$valoresY=array();//valores
		$valoresX=array();//horas
		
		while($ver=mysqli_fetch_row($result)){
			$valoresX[] = $ver[1]; 
			$valoresY[] = $ver[0];
		}
		
		$datosX = json_encode($valoresX);
		$datosY = json_encode($valoresY);
		
		$arrayFinal = [$datosX, $datosY];
		
		return $arrayFinal;
	
	}
	
	$datosTodos = update();
?>

<div id="graficaLineal5"> </div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
	
	
</script>

<script type="text/javascript">

	datosX = crearCadenaLineal('<?php echo $datosTodos[0] ?>');
	datosY = crearCadenaLineal('<?php echo $datosTodos[1] ?>');
		
	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter'
	};


	var data = [trace1];
	
	var layout = {
		title:'Gráfico 1'
	};

		
	Plotly.plot('graficaLineal5', data, layout);
					
	var dataxx;
	var datayy;
		
	setInterval(function(){
			
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor1_y.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor1_y.php" }, function(data) {
			datayy = data;  
		});
				
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor1_x.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor1_x.php" }, function(data) {
			dataxx= data;  
		});
				
		var update = {
			x: [[dataxx]],
			y: [[datayy]]
		};
		
		Plotly.extendTraces('graficaLineal5', update, [0], 10);
	
	}, 1000);
			
			
</script>
   