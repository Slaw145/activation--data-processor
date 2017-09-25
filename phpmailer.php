<?php

	require_once 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();

	$mail->Host = "smtp.gmail.com";

	$mail->isSMTP();

	$mail->SMTPAuth = true;

	$mail->Username = "sawekk982@gmail.com";
	$mail->Password = "wilwamaestro";

	$mail->SMTPSecure = "ssl"; 

	$mail->Port = 465; 

	$mail->Subject = "Zaznaczone aktywacje";

	$mail->isHTML(true);

	if($informationUser==" " && $file=="CheckedActivationsInDatabase.txt")
	{
		require_once 'sendemailwithactivations.php';
	}
	else
	{
		require_once 'SendInformationAboutUser.php';
	}

	$mail->setFrom('sawekk982@gmail.com', 'Zaznaczone aktywacje');

	$mail->addAddress($email);

	if ($mail->send())
	    $_SESSION['message_ok']="Wysłano wiadomość!";

?>