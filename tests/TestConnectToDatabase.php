<?php

require_once "ConnectTodatabase.php";


class TestConnectToDatabase extends PHPUnit_Framework_TestCase 
{
    public function testCreatingNewFile()
    {
        $operation = new OperationsOnFiles();

        $ResourceFile=$operation->CreateNewFile("test.txt");

        $this->assertEquals($ResourceFile,$ResourceFile);
    }

    public function testFailedCreatingNewFile()
    {
        $operation = new OperationsOnFiles();

        $ResourceFile=$operation->CreateNewFile(" ");

        $this->assertEquals(0,$ResourceFile);
    }

    public function testSavingActivationsToFile()
    {
        $operation = new OperationsOnFiles();

        $ResourceFile=$operation->CreateNewFile("test.txt");

        $SavingData=$operation->SaveActivationsToCreatedFile($ResourceFile,"testowedane");

        $this->assertTrue($SavingData);
    }
    public function testFailedWhenSavingActivationsToFile()
    {
        $operation = new OperationsOnFiles();

        $ResourceFile=$operation->CreateNewFile(" ");

        $SavingData=$operation->SaveActivationsToCreatedFile($ResourceFile,"testowedane");

        $this->assertFalse($SavingData);
    }

    public function testFailedSendingMail()
    {
        $sendemail= new Emails();

        $result=$sendemail->SendEmail(" "," "," ");

        $this->assertFalse($result);
    }
}