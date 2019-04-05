<?php

spl_autoload_register(function($Name) {
    $filePath = "$Name.php";
    $macFilePath = str_replace('\\', '/', $filePath);
    require_once $macFilePath;   
});
