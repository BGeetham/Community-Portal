<?php
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/M5Reg/" .$class_name . '.php';
});
?>


