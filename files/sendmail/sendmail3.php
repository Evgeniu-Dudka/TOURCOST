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
	$mail->Subject = 'Tourcost Турпакеты';

	//Тіло листа
	$body = '<h1>Турпакеты</h1>';

	if(trim(!empty($_POST['where2']))){
		$body.='<p><strong>Откуда:</strong> '.$_POST['where2'].'</p>';
	}	
	if(trim(!empty($_POST['fromWhere2']))){
		$body.='<p><strong>Направление:</strong> '.$_POST['fromWhere2'].'</p>';
	}	
	if(trim(!empty($_POST['departure2']))){
		$body.='<p><strong>Даты:</strong> '.$_POST['departure2'].'</p>';
	}	
	if(trim(!empty($_POST['adults2']))){
		$body.='<p><strong>Количество взрослых:</strong> '.$_POST['adults2'].'</p>';
	}	
	if(trim(!empty($_POST['children2']))){
		$body.='<p><strong>Количество детей:</strong> '.$_POST['children2'].'</p>';
	}	
	if(trim(!empty($_POST['class2']))){
		$body.='<p><strong>Класс:</strong> '.$_POST['class2'].'</p>';
	}	
	if(trim(!empty($_POST['eat2']))){
		$body.='<p><strong>Еда:</strong> '.$_POST['eat2'].'</p>';
	}	
	if(trim(!empty($_POST['stars2']))){
		$body.='<p><strong>Отель:</strong> '.$_POST['stars2'].'</p>';
	}	
	if(trim(!empty($_POST['deys2']))){
		$body.='<p><strong>Сколько дней:</strong> '.$_POST['deys2'].'</p>';
	}	
	if(trim(!empty($_POST['transfer2']))){
		$body.='<p><strong>Трансфер:</strong> '.$_POST['transfer2'].'</p>';
	}	
    if(trim(!empty($_POST['name2']))){
		$body.='<p><strong>ФИО:</strong> '.$_POST['name2'].'</p>';
	}	
    if(trim(!empty($_POST['telephone2']))){
		$body.='<p><strong>Номер телефона:</strong> '.$_POST['telephone2'].'</p>';
	}	
    if(trim(!empty($_POST['preference2']))){
		$body.='<p><strong>Предпочтения:</strong> '.$_POST['preference2'].'</p>';
	}	

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'eror';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>