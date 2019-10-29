<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Sign in Form with Avatar Image</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Francois+One:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/stylesLogin.css" />
<script src="librerias/jquery-3.4.1.min.js"></script>
<script src="librerias/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<div class="avatar">
			<img src="imagenes/logo.png" alt="Avatar" />
		</div>
        <h2 class="text-center">Login</h2>
		<div class="social-btn text-center">
			<a href="#" class="btn btn-primary btn-block btn-lg"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
			<a href="#" class="btn btn-info btn-block btn-lg"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>
			<a href="#" class="btn btn-danger btn-block btn-lg"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
		</div>
		<div class="or-seperator"><i>or</i></div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">	
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign in</button>
        </div>
		<p class="text-center small"><a href="#">Forgot Password?</a></p>
		<p class="text-center small">Don't have an account? <a href="#">Sign up here!</a></p>
    </form>
   
</div>
</body>
</html>                            