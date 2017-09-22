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

    public function testSavingActivationsToFile()
    {
        $operation = new OperationsOnFiles();

        $ResourceFile=$operation->CreateNewFile("test.txt");

        $SavingData=$operation->SaveActivationsToCreatedFile($ResourceFile,"testowedane");

        $this->assertTrue($SavingData);
    }
}