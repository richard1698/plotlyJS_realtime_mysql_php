
<?php
	
	require_once "api/conexion.php";
	
	function update(){
		global $conexion;
		//$sql = "select valor, hora from graficos order by id_graficos desc limit 10 ";
		$sql = "select * from (select valor_two, hora, id_graficos from graficos order by id_graficos desc limit 10) t order by t.id_graficos ";
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
	
	$datosTodos2 = update();
?>

<div id="graficaLineal2"> </div>

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

	datosX2 = crearCadenaLineal('<?php echo $datosTodos2[0] ?>');
	datosY2 = crearCadenaLineal('<?php echo $datosTodos2[1] ?>');
		
	var trace2 = {
		x: datosX2,
		y: datosY2,
		type: 'scatter'
	};


	var data2 = [trace2];
	
	var layout2 = {
		title:'Gráfico 2'
	};

		
	Plotly.plot('graficaLineal2', data2, layout2);
					
	var dataxx2;
	var datayy2;
		
	setInterval(function(){
			
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor2_y.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor2_y.php" }, function(data) {
			datayy2 = data;  
		});
				
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor2_x.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor2_x.php" }, function(data) {
			dataxx2= data;  
		});
				
		var update2 = {
			x: [[dataxx2]],
			y: [[datayy2]]
		};
		
		Plotly.extendTraces('graficaLineal2', update2, [0], 10);
	
	}, 1000);
			
			
</script>
   