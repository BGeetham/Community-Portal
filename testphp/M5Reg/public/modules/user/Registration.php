<?php

class RegistrationManager
{
    public function saveRegistrant($objRegistrant){
        return RegistrationManagerDB::saveRegistrant($objRegistrant);
    }
}

class RegistrationManagerDB
{
    public static function saveRegistrant( $objRegistrant){
        
        return "Successfully Saved";    
    }
    
}


class Registrant
{
    public $firstName;
    public $lastName;
    public $email;
    
}

$objRegistrant=new Registrant();

$objRegistrant->firstName="Geetha";
$objRegistrant->lastName="boorla";
$objRegistrant->email="geetha@gmail.com";

   
$RM=new RegistrationManager();

$reslut = $RM->saveRegistrant($objRegistrant);

echo $reslut;
?>