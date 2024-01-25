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
	$mail->Subject = 'Tourcost страховка';

	//Тіло листа
	$body = '<h1>Страховка</h1>';

	if(trim(!empty($_POST['country4']))){
		$body.='<p><strong>Страна отправления:</strong> '.$_POST['country4'].'</p>';
	}	
	if(trim(!empty($_POST['where4']))){
		$body.='<p><strong>Туда:</strong> '.$_POST['where4'].'</p>';
	}	
	if(trim(!empty($_POST['fromWhere4']))){
		$body.='<p><strong>Обратно:</strong> '.$_POST['fromWhere4'].'</p>';
	}	
	if(trim(!empty($_POST['departure4']))){
		$body.='<p><strong>Количество дней:</strong> '.$_POST['departure4'].'</p>';
	}	
	if(trim(!empty($_POST['adults4']))){
		$body.='<p><strong>Количество взрослый:</strong> '.$_POST['adults4'].'</p>';
	}	
	if(trim(!empty($_POST['children4']))){
		$body.='<p><strong>Количество детей:</strong> '.$_POST['children4'].'</p>';
	}
	if(trim(!empty($_POST['class4']))){
		$body.='<p><strong>Авиаперелёт:</strong> '.$_POST['class4'].'</p>';
	}		
	if(trim(!empty($_POST['name4']))){
		$body.='<p><strong>ФИО:</strong> '.$_POST['name4'].'</p>';
	}	
	if(trim(!empty($_POST['telephone4']))){
		$body.='<p><strong>Номер телефона:</strong> '.$_POST['telephone4'].'</p>';
	}	
	if(trim(!empty($_POST['preference4']))){
		$body.='<p><strong>Предпочтения:</strong> '.$_POST['preference4'].'</p>';
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