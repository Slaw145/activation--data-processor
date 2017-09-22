<?php

session_start();

require_once "ConnectTodatabase.php";

if(isset($_POST['email']))
{
	$email=$_POST['email'];
	$numseries=$_POST['numseries'];
	$datamikropro=$_POST['datamikropro'];

	$connect= new ConnectToDatabase($email,$numseries,$datamikropro);

	$ifconnected=$connect->ConnectWithDatabase();

	if($ifconnected==false)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$valueactivationtodatabase=$connect->SaveActivationsToTable();

		$connect->UpdateTableAktywacjeWhereEmailEaqul($valueactivationtodatabase);
	}

	$operation= new OperationsOnFiles();

	$sendemail= new Emails();

	$namefile="CheckedActivationsInDatabase.txt";

	$newFile=$operation->CreateNewFile($namefile);

	$sendActivation=$sendemail->UpdateActivation();

	$data='Aktywacja 1: '.$sendActivation[1]."\nAktywacja 2: ".$sendActivation[2]."\nAktywacja 3: ".$sendActivation[3]."\nAktywacja 4: ".$sendActivation[4]."\nAktywacja 5: ".$sendActivation[5]."\nAktywacja 6: ".$sendActivation[6]."\nAktywacja 7: ".$sendActivation[7]."\nAktywacja 8: ".$sendActivation[8]."\nAktywacja 9: ".$sendActivation[9]."\nAktywacja 10: ".$sendActivation[10];

	$file=$operation->SaveActivationsToCreatedFile($newFile,$data);

	$sendemail->SendEmail($email,$namefile);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<br><br>
<div class="container">
	<form action="" method="post">
		<div style="width:50%; float:left;">
			
			<input type ="email" name="email" required> <br>Wpisz email pod jaki maja być wysłane zaznaczone aktywacje
			<br>
			<?php 

			// if(isset($_SESSION['error']))
			// {
			// 	echo '<div style="color:red;">'.$_SESSION['error'].'</div>';
			// 	unset($_SESSION['error']);
			// }
			if(isset($_SESSION['message_ok']))
			{
				echo '<div style="color:green;">'.$_SESSION['message_ok'].'</div>';
				unset($_SESSION['message_ok']);
			}

			?>
			<br>

			<label><input type="checkbox" name="active1" value="1">Aktywacja 1</label>
			<br>
			<label><input type="checkbox" name="active2" value="1">Aktywacja 2</label>
			<br>
			<label><input type="checkbox" name="active3" value="1">Aktywacja 3</label>
			<br>
			<label><input type="checkbox" name="active4" value="1">Aktywacja 4</label>
			<br>
			<label><input type="checkbox" name="active5" value="1">Aktywacja 5</label>
			<br>
			<label><input type="checkbox" name="active6" value="1">Aktywacja 6</label>
			<br>
			<label><input type="checkbox" name="active7" value="1">Aktywacja 7</label>
			<br>
			<label><input type="checkbox" name="active8" value="1">Aktywacja 8</label>
			<br>
			<label><input type="checkbox" name="active9" value="1">Aktywacja 9</label>
			<br>
			<label><input type="checkbox" name="active10" value="1">Aktywacja 10</label>
			
		</div>
		
		<div id="sample" style="width:50%; float:right;">
		  <h3>Numer seryjny</h3>
			<input type ="text" name="numseries" required> 
			<br><br>
		  <h4>
		    Dane z procesora
		  </h4>
		  <textarea name="datamikropro" rows=11 cols=50 required>
		  	
		  </textarea>

		</div>

		<input type="submit" style="margin-top: 100px; float:right;" class="btn btn-primary">
	</form>

</div>

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>

</body>
</html>