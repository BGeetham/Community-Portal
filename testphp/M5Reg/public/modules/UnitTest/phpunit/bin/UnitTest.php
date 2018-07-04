<?php
require_once 'MassEmailUnitTest.php';

class UnitTest extends PHPUnit_Framework_TestCase
{
    public function test__construct()
    {
       
       // $this->assertEquals('HelloWorld', 'HelloWorld');
        
        $hw = new MassEmailUnitTest();
        $string = $hw->sendMail();
        $this->assertEquals('true', $string);
        
    }
}

?>
