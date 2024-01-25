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
	$mail->Subject = 'Tourcost Виза';

	//Тіло листа
	$body = '<h1>Виза</h1>';

	if(trim(!empty($_POST['where1']))){
		$body.='<p><strong>Откуда:</strong> '.$_POST['where1'].'</p>';
	}	
	if(trim(!empty($_POST['fromWhere1']))){
		$body.='<p><strong>Куда:</strong> '.$_POST['fromWhere1'].'</p>';
	}	
	if(trim(!empty($_POST['departure1']))){
		$body.='<p><strong>Примерные даты:</strong> '.$_POST['departure1'].'</p>';
	}	
	if(trim(!empty($_POST['adults1']))){
		$body.='<p><strong>Количество взрослых:</strong> '.$_POST['adults1'].'</p>';
	}	
	if(trim(!empty($_POST['children1']))){
		$body.='<p><strong>Количество детей:</strong> '.$_POST['children1'].'</p>';
	}	
	if(trim(!empty($_POST['class1']))){
		$body.='<p><strong>Авиаперелёт</strong> '.$_POST['class1'].'</p>';
	}	
	if(trim(!empty($_POST['name1']))){
		$body.='<p><strong>ФИО:</strong> '.$_POST['name1'].'</p>';
	}	
	if(trim(!empty($_POST['telephone1']))){
		$body.='<p><strong>Номер телефона:</strong> '.$_POST['telephone1'].'</p>';
	}	
	if(trim(!empty($_POST['preference1']))){
		$body.='<p><strong>Предпочтения:</strong> '.$_POST['preference1'].'</p>';
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