<?php
require_once 'MassEmailUnitTest.php';

class UnitTest extends PHPUnit_Framework_TestCase
{
    public function test__construct()
    {
       
        $hw = new MassEmailUnitTest();
        $receipents=array("seenuboorla@gmail.com","mehergeetha@gmail.com");
        $arrlength=count($receipents);
        
        for($x=0;$x<$arrlength;$x++)
        {
            $string = $hw->sendMail($receipents[$x]);
            $this->assertEquals('true', $string);
           
        }
       

        
    }
}

?>
