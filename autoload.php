<?php

function autoload($className) {
    $className = str_replace('-','',ucwords($className,'-'));
    $className = ucfirst($className);
    $fileName = __DIR__.'\\' .$className.".php";
    echo '<br>';
    if(file_exists($fileName)) {
        require_once $fileName;
    }
}
spl_autoload_extensions(".php");
spl_autoload_register('autoload');
