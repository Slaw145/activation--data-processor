<?php

$mail->Body = 'Hello<br>Please send license uuprogs to<br>Registration form:<br>----------------------------<br>Salutation (pan/pani) = <br>
											Last Name (nazwisko) =<br>
											First Name (imie) =<br>
											Company (firma) =<br>
											Street (ulica) =<br>
											ZIP (kod pocztowy) =<br>
											City (miasto) =<br>
											FullCity (pelna nazwa miasta) =<br>
											Country (kraj) =<br>
											State / Province(wojewodztwo) =<br>
											Phone (telefon) =<br>
											Fax (fax) =<br>
											E-Mail (dzialajacy e-mail) =<br>
											Registration name(nick-nazwa firmy) =<br>
											----------------------------<br>Sale Date (data zakupu) =<br>
											Paragon/Faktura NR (numer paragonu/FV)= Paragon/Faktura NR (Paragon/Invoice)<br>
											----------------------------<br>Thank you
											<br><br>

											Pozdrawiam serdecznie
											<br>
											Tomasz  Sadowski
											<br>
											TOMSAD
											<br>
											tel 694 56 29 73
											<br>

											UWAGA!! Polecamy szkolenia "Alfabet programatorów"
											<br><a href="http://www.programatory.com/index.php?p309,szkolenie-alfabet-programatorow" target="_blank">http://www.programatory.com/index.php?p309,szkolenie-alfabet-programatorow</a><br>
											<h3>Zaznaczone aktywacje w bazie danych w pliku</h3>';

	$mail->addAttachment($file, 'Plik z aktywacjami');