
<?php
	
	require_once "api/conexion.php";
	
	function update(){
		global $conexion;
		//$sql = "select valor, hora from graficos order by id_graficos desc limit 10 ";
		$sql = "select * from (select valor_three, hora, id_graficos from graficos order by id_graficos desc limit 10) t order by t.id_graficos ";
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
	
	$datosTodos3 = update();
?>

<div id="graficaLineal3"> </div>

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

	datosX3 = crearCadenaLineal('<?php echo $datosTodos3[0] ?>');
	datosY3 = crearCadenaLineal('<?php echo $datosTodos3[1] ?>');
		
	var trace3 = {
		x: datosX3,
		y: datosY3,
		type: 'scatter'
	};


	var data3 = [trace3];
	
	var layout3 = {
		title:'Gráfico 3'
	};

		
	Plotly.plot('graficaLineal3', data3, layout3);
					
	var dataxx3;
	var datayy3;
		
	setInterval(function(){
			
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor3_y.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor3_y.php" }, function(data) {
			datayy3 = data;  
		});
				
		$.post("http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor3_x.php", { url: "http://186.101.252.206:8480/graficasForLogo/api/ultimo_sensor3_x.php" }, function(data) {
			dataxx3 = data;  
		});
				
		var update3 = {
			x: [[dataxx3]],
			y: [[datayy3]]
		};
		
		Plotly.extendTraces('graficaLineal3', update3, [0], 10);
	
	}, 1000);
			
			
</script>
   