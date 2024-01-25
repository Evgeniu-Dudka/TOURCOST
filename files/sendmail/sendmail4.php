<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'server1.ahost.cloud';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'info@tourcost.uz';                     //SMTP username
	$mail->Password   = 'H1Yn)6$=,Ca0';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	

	//Від кого лист
	$mail->setFrom('info@tourcost.uz', 'Tourcost'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('info@tourcost.uz'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Tourcost эксткурсии';

	//Тіло листа
	$body = '<h1>Эксткурсии</h1>';

	if(trim(!empty($_POST['name3']))){
		$body.='<p><strong>ФИО:</strong> '.$_POST['name3'].'</p>';
	}	
	if(trim(!empty($_POST['telephone3']))){
		$body.='<p><strong>НОмер телефона:</strong> '.$_POST['telephone3'].'</p>';
	}	
	if(trim(!empty($_POST['preference3']))){
		$body.='<p><strong>Предпочтения:</strong> '.$_POST['preference3'].'</p>';
	}	

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'error';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>