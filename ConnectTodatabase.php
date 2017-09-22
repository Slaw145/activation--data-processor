<?php

class ConnectToDatabase
{
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

		if($this->polaczenie->connect_errno!=0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function SaveActivationsToTable()
	{
		for($i=1;$i<=10;$i++)
		{
			$activetodatabase[$i]=$_POST['active'.$i];
		}

		return $activetodatabase;
	}

	public function UpdateTableAktywacjeWhereEmailEaqul($activetodatabase)
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
}

class Emails{

	private $imgCheck='<img src="slawe.ayz.pl/Aktywacje/img/check.gif" style="width:25px; height:25px;" alt="">';
	private $imgUncheck='<img src="slawe.ayz.pl/Aktywacje/img/uncheck.gif" style="width:25px; height:20px;" alt="">';

	public function SendEmail($email,$file)
	{
		if($email)
		{
			$active=$this->UpdateActivation();

			require 'phpmailer.php';

			return true;
		}
		else
		{
			return false;
		}
	}

	public function UpdateActivation()
	{
		for($i=1;$i<=10;$i++)
		{
			$active[$i]=$_POST['active'.$i];

			if($active[$i]==1)
			{
				$active[$i]=$this->imgCheck;
			}
			else if($active[$i]!=1)
			{
				$active[$i]=$this->imgUncheck;
			}
		}

		return $active;
	}
}

class OperationsOnFiles
{

	public function CreateNewFile($namefile)
	{
		if($namefile)
		{
			return $uchwyt = fopen($namefile, "w");
		}
		else
		{
			return 0;
		}
	}

	public function SaveActivationsToCreatedFile($resource,$dane)
	{
		if($dane && $resource)
		{
			$data=fwrite($resource, $dane); 
			return true;
		}
		else
		{
			return false;
		}	
	}

}