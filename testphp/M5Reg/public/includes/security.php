<?php

if(!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['email'])){
    header("Location:/M5Reg/public/LandingPage.php");
}
?>