<?php 

require_once 'functions.php';

spl_autoload_register(function ($ClassName) {
    require_once  "$_SERVER[DOCUMENT_ROOT]/test/classes/$ClassName" . '.php';


});


?>