<?php
	//include('config.php');//aumento
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Graficas For Logo</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Francois+One:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/stylesLogin.css" />
<script src="librerias/jquery-3.4.1.min.js"></script>
<script src="librerias/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="librerias/bootstrap-show-password.min.js" type="text/javascript"></script>
<script src="js/peticion.js"></script>
</head>
<body>
<div class="login-form">
    <form action="" method="POST">
	
		
		<img src="imagenesProfile/userDefault2.png" id="photoPerfil" class="avatar" alt="Avatar" />
		
		
        <h2 class="text-center">Login</h2>
		<div class="social-btn text-center">
			<!--<a href="?login=Facebook" class="btn btn-primary btn-block btn-lg"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>-->
			<!--<a href="?login=Twitter" class="btn btn-info btn-block btn-lg"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>-->
			<a href="http://localhost:8480/graficasForLogo/index.php?social=google" class="btn btn-danger btn-block btn-lg"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
		</div>
		<div class="or-seperator"><i>or</i></div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" id="txtUsername" placeholder="Username" required="required" autocomplete="on">		
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" data-toggle="password" required="required" autocomplete="on">	
        </div>    
			
		<script type="text/javascript">
			$("#password").password('toggle');
		</script>
				
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign in</button>
        </div>
		<p class="text-center small">
		<?php
			if(isset($errorLogin)){
				echo '<span id="caja">'. $errorLogin .'</span>';
			}
		?>
		</p>
		<br>
		<p class="text-center small"><a href="#">Forgot Password?</a></p>
		<p class="text-center small">Don't have an account? <a href="http://localhost:8480/graficasForLogo/views/register.php">Sign up here!</a></p>
    </form>
   
</div>
</body>
</html>                            