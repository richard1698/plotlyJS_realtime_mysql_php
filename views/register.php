<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registrate - Graficas For Logo</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Francois+One:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
<script src="../librerias/jquery-3.4.1.min.js"></script>
<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
<script src="../librerias/bootstrap-show-password.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/stylesRegister.css" />

</head>
<body>
<div class="login-form">
    <form id="myForm" action="../api/prueba3.php" method="POST" enctype="multipart/form-data">
		
		<!--<div class="avatar">-->
			<img id="img" class="avatar" src="../imagenes/add-user.png" style=" border-radius:50%;" alt="Avatar" />
			<input id="html_btn" type="file" onchange="mostrar()" name="imagen" /> <br>
		<!--</div>-->
		
        <h2 class="text-center">Create Account</h2>
		<div class="form-group">
        	<input type="text" class="form-control" name="nombres" placeholder="Nombres" required>		
        </div>
		<div class="form-group">
        	<input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>		
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="cedula" placeholder="Cedula" required>		
        </div>
		<div class="form-group">
        	<input type="text" class="form-control" name="mail" placeholder="Correo Electrónico" required>		
        </div>
		<div class="form-group">
        	<input type="text" class="form-control" name="user" placeholder="Nombre de usuario" required>		
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" data-toggle="password" placeholder="Password" required>	
        </div> 
		
		<script type="text/javascript">
			$("#password").password('toggle');
		</script>
		
		<div class="form-group">
            <p style="text-align: center; font-weight:bold;">G&eacutenero </p>
        </div>
		<div class="row">
		<div class="col-sm-6">
			<div class="form-check">
				<label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" id="radio1" name="optradio" value="M" checked> Masculino
				</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-check">
				<label class="form-check-label" for="radio2">
					<input type="radio" class="form-check-input" id="radio2" name="optradio" value="F"> Femenino
			</label>
			</div>
		</div>
		</div>
		<script>
			document.getElementById('txtHide').value = $('input[name=optradio]:checked', '#myForm').val();
			$('#myForm input').on('change', function() {
				document.getElementById('txtHide').value = $('input[name=optradio]:checked', '#myForm').val(); 
			});
		</script>
		<div class="form-group" style="display:none;">
        	<input type="text" class="form-control" name="sexo" id="txtHide" >		
        </div>
		<br>
        <div class="form-group">
            <button type="submit" name="btnEnviar" class="btn btn-primary btn-lg btn-block login-btn">REGISTRARME</button>
        </div>
    </form>
	<script>
		$('#img').bind("click" , function () {
        $('#html_btn').click();
    });
	
	$('#img').bind("change" , function () {
        $('#html_btn').change();
    });
	
	
	

 $(function() {
  $('#html_btn').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#img').attr("src",result);
     }
    });
 

	</script>
   
</div>
</body>
</html>                            