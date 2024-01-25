
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
	$mail->Subject = 'Tourcost авиабилеты';

	//Тіло листа
	$body = '<h1>Авиабилеты</h1>';

	if(trim(!empty($_POST['where']))){
		$body.='<p><strong>Откуда:</strong> '.$_POST['where'].'</p>';
	}	
	if(trim(!empty($_POST['fromWhere']))){
		$body.='<p><strong>Куда:</strong> '.$_POST['fromWhere'].'</p>';
	}	
	if(trim(!empty($_POST['departure']))){
		$body.='<p><strong>Дата отбытия:</strong> '.$_POST['departure'].'</p>';
	}	
	if(trim(!empty($_POST['arrival']))){
		$body.='<p><strong>Дата прибытия:</strong> '.$_POST['arrival'].'</p>';
	}	
	if(trim(!empty($_POST['adults']))){
		$body.='<p><strong>Количество взрослый:</strong> '.$_POST['adults'].'</p>';
	}	
	if(trim(!empty($_POST['children']))){
		$body.='<p><strong>Количество детей:</strong> '.$_POST['children'].'</p>';
	}	
	if(trim(!empty($_POST['class']))){
		$body.='<p><strong>Класс:</strong> '.$_POST['class'].'</p>';
	}	
	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>ФИО:</strong> '.$_POST['name'].'</p>';
	}	
	if(trim(!empty($_POST['telephone']))){
		$body.='<p><strong>Номер телефона:</strong> '.$_POST['telephone'].'</p>';
	}	
	if(trim(!empty($_POST['preference']))){
		$body.='<p><strong>Предпочтения:</strong> '.$_POST['preference'].'</p>';
	}	
	
	/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

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