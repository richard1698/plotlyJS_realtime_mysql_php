<?php
	require 'librerias/PHPMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require 'librerias/PHPMailer/vendor/phpmailer/phpmailer/src/Exception.php';
	require 'librerias/PHPMailer/vendor/phpmailer/phpmailer/src/SMTP.php';
	
	require 'librerias/PHPMailer/vendor/autoload.php';
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	date_default_timezone_set('America/Guayaquil');
	
	try {
	$mail = new PHPMailer(true);
	
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	//jeffer_david@hotmail.com
	//joelmatuano98@gmail.com
	$mail->Username = 'juelgarcia98@gmail.com'; //Correo de donde enviaremos los correos
	$mail->Password = 'seguridad2019joel'; // Password de la cuenta de envío
	
	$mail->setFrom('juelgarcia98@gmail.com', 'GraficosForLogo');
	$mail->addAddress('joelmantuano98@gmail.com', 'Receptor'); //Correo receptor
	
	$mail->isHTML(true);  
	
	$mail->Subject = 'Reporte Mensual';
	$mail->Body    = 'Este es un reporte Mensual xd';
	//C:\xampp2\htdocs\graficasForLogo\imagenesProfile
	$mail->addAttachment('C:\xampp2\htdocs\graficasForLogo\imagenesProfile\richijoel.jpg', 'new.jpg');
	$mail->addAttachment('C:\xampp2\htdocs\graficasForLogo\ficherosMensuales\Reporte-'.strval(date('d-m-Y')).'.xlsx', 'Reporte-Mensual-'.strval(date('d-m-Y')).'.xlsx');
	$mail->addAttachment('C:\xampp2\htdocs\graficasForLogo\ficherosMensuales\Reporte-'.strval(date('d-m-Y')).'.pdf', 'Reporte-Mensual-'.strval(date('d-m-Y')).'.pdf');
	//$mail->addAttachment( $_SERVER['DOCUMENT_ROOT'].'/graficasForLogo/imagenesProfile/richijoel.jpg', 'new.jpg');
	//$mail->addAttachment('imagenesProfile/Reporte.xlsx', 'Reporte-Mensual.xlsx');
	//$mail->addAttachment('imagenesProfile/doc.pdf', 'Reporte-Mensual.pdf');
	
	if($mail->send()) {
		echo 'Correo Enviado';
		} else {
		echo 'Error al enviar correo';
	}
	
	} catch (Exception $e){
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
?>

