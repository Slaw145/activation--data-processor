<?php

	require 'phpmailer/PHPMailerAutoload.php';

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

	$mail->Body = '<h3>Zaznaczone aktywacje w bazie danych</h3><br><div style="font-size:20px;">Aktywacja 1: '.$active[1]."<br>Aktywacja 2: ".$active[2]."<br>Aktywacja 3: ".$active[3]."<br>Aktywacja 4: ".$active[4]."<br>Aktywacja 5: ".$active[5]."<br>Aktywacja 6: ".$active[6]."<br>Aktywacja 7: ".$active[7]."<br>Aktywacja 8: ".$active[8]."<br>Aktywacja 9: ".$active[9]."<br>Aktywacja 10: ".$active[10]."</div>";

	$mail->setFrom('sawekk982@gmail.com', 'Zaznaczone aktywacje');

	$mail->addAddress($this->_email);

	if ($mail->send())
	    $_SESSION['message_ok']="Wysłano wiadomość!";

?>