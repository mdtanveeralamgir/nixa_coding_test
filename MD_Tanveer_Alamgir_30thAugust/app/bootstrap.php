<?php

require_once "config.php";


spl_autoload_register(function($className)
{
    $className = str_replace("\\", DIRECTORY_SEPARATOR, strtolower($className));
    require_once ROOT . "/{$className}.php";
});