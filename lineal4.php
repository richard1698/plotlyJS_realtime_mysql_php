
<?php
	
	require_once "api/conexion.php";
	
	function update(){
		global $conexion;
		//$sql = "select valor, hora from graficos order by id_graficos desc limit 10 ";
		$sql = "select * from (select valor_four, hora, id_graficos from graficos order by id_graficos desc limit 10) t order by t.id_graficos ";
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
	
	$datosTodos4 = update();
?>

<div id="graficaLineal4"> </div>

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

	datosX4 = crearCadenaLineal('<?php echo $datosTodos4[0] ?>');
	datosY4 = crearCadenaLineal('<?php echo $datosTodos4[1] ?>');
		
	var trace4 = {
		x: datosX4,
		y: datosY4,
		type: 'scatter'
	};


	var data4 = [trace4];
	
	var layout4 = {
		title:'Gráfico 4'
	};

		
	Plotly.plot('graficaLineal4', data4, layout4);
					
	var dataxx4;
	var datayy4;
		
	setInterval(function(){
			
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor4_y.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor4_y.php" }, function(data) {
			datayy4 = data;  
		});
				
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor4_x.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor4_x.php" }, function(data) {
			dataxx4= data;  
		});
				
		var update4 = {
			x: [[dataxx4]],
			y: [[datayy4]]
		};
		
		Plotly.extendTraces('graficaLineal4', update4, [0], 10);
	
	}, 1000);
			
			
</script>
   