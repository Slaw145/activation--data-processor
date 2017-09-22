<?php

session_start();

require_once "ConnectTodatabase.php";

if(isset($_POST['email']))
{
	$email=$_POST['email'];
	$numseries=$_POST['numseries'];
	$datamikropro=$_POST['datamikropro'];

	$connect= new ConnectToDatabase($email,$numseries,$datamikropro);

	$czyemail=$connect->ConnectWithDatabase();

	if($czyemail==false)
	{
		$_SESSION['error']="Nie ma takiego maila w bazie danych!";
	}
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

			if(isset($_SESSION['error']))
			{
				echo '<div style="color:red;">'.$_SESSION['error'].'</div>';
				unset($_SESSION['error']);
			}
			else if(isset($_SESSION['message_ok']))
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