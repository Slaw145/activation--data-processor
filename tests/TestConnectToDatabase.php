<?php

require_once "ConnectTodatabase.php";


class TestConnectToDatabase extends PHPUnit_Framework_TestCase 
{
    public function testConnectDatabase()
    {
        $connect = new ConnectToDatabase();

        $IfConnectTrue=$connect->ConnectWithDatabase();

        var_dump($IfConnectTrue);

        $this->assertTrue($IfConnectTrue);
    }
}