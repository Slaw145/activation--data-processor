<?php

class ConnectToDatabase
{

	private $imgCheck='<img src="slawe.ayz.pl/Aktywacje/img/check.gif" style="width:25px; height:25px;" alt="">';
	private $imgUncheck='<img src="slawe.ayz.pl/Aktywacje/img/uncheck.gif" style="width:25px; height:20px;" alt="">';

	private $_email;
	private $_numseries;
	private $_datamikropro;

	public $polaczenie;

	public function __construct($Email,$Numseries,$Datamikropro) 
	{
		$this->_email=$Email;
		$this->_numseries=$Numseries;
		$this->_datamikropro=$Datamikropro;
    }

	public function ConnectWithDatabase()
	{
		require_once "connect.php";

		$this->polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);

		if($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		}
		else
		{
			return $this->IfDatabaseIsConnected();
		}
	}

	private function IfDatabaseIsConnected()
	{
		$ifemail=$this->SelectTableAktywacjeWhereEmailEaqul();

		if ($ifemail > 0) 
		{
			$valueactivationtodatabase=$this->SendEmail();

			return $this->UpdateTableAktywacjeWhereEmailEaqul($valueactivationtodatabase);
		}
		else
		{
			return $this->DisplayErrorIfEmailNotFoundInDatabase();
		}
	}

	private function SendEmail()
	{
		for($i=1;$i<=10;$i++)
		{
			$active[$i]=$_POST['active'.$i];
			$activetodatabase[$i]=$_POST['active'.$i];
			if($active[$i]==1)
			{
				$active[$i]=$this->imgCheck;
			}
			else if($active[$i]!=1){
				$active[$i]=$this->imgUncheck;
				$activetodatabase[$i]=0;
			}
		}

		require 'phpmailer.php';

		return $activetodatabase;
	}

	private function UpdateTableAktywacjeWhereEmailEaqul($activetodatabase)
	{
		$updateDatabase="UPDATE Aktywacje SET numerseryjny='$this->_numseries', danezprocesora='$this->_datamikropro', aktywacja1='$activetodatabase[1]', aktywacja2='$activetodatabase[2]', aktywacja3='$activetodatabase[3]', aktywacja4='$activetodatabase[4]', aktywacja5='$activetodatabase[5]', aktywacja6='$activetodatabase[6]', aktywacja7='$activetodatabase[7]', aktywacja8='$activetodatabase[8]', aktywacja9='$activetodatabase[9]', aktywacja10='$activetodatabase[10]' WHERE email='$this->_email'";

		if(@$this->polaczenie->query($updateDatabase))
		{
			return true;
		}
		else{
			return false;
		}
	}

	private function SelectTableAktywacjeWhereEmailEaqul()
	{
		$sqlget="SELECT * FROM Aktywacje WHERE email='$this->_email'";

		$rezult=@$this->polaczenie->query($sqlget);

		return $rezult->num_rows;
	}

	private function DisplayErrorIfEmailNotFoundInDatabase()
	{
		return false;
	}
}