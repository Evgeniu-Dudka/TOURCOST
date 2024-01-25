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
	$mail->Subject = 'Tourcost отель';

	//Тіло листа
	$body = '<h1>Отель</h1>';

	if(trim(!empty($_POST['country5']))){
		$body.='<p><strong>Направление:</strong> '.$_POST['country5'].'</p>';
	}	
	if(trim(!empty($_POST['where5']))){
		$body.='<p><strong>Дата отбытия:</strong> '.$_POST['where5'].'</p>';
	}	
	if(trim(!empty($_POST['stars5']))){
		$body.='<p><strong>Сколько звезд отель:</strong> '.$_POST['stars5'].'</p>';
	}	
	if(trim(!empty($_POST['adults5']))){
		$body.='<p><strong>Количество взрослых:</strong> '.$_POST['adults5'].'</p>';
	}	
	if(trim(!empty($_POST['children5']))){
		$body.='<p><strong>Количество детей:</strong> '.$_POST['children5'].'</p>';
	}	
	if(trim(!empty($_POST['class5']))){
		$body.='<p><strong>Авиаперелёт:</strong> '.$_POST['class5'].'</p>';
	}	
	if(trim(!empty($_POST['name5']))){
		$body.='<p><strong>ФИО:</strong> '.$_POST['name5'].'</p>';
	}	
	if(trim(!empty($_POST['telephone5']))){
		$body.='<p><strong>Номер телефона:</strong> '.$_POST['telephone5'].'</p>';
	}	
	if(trim(!empty($_POST['preference5']))){
		$body.='<p><strong>Предпочтения:</strong> '.$_POST['preference5'].'</p>';
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