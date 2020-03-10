<?php
/**
 * загрузка классов
 */
spl_autoload_register(function($class)
{
    $path = ROOT . str_replace('\\', '/', $class) . EXP;
    if (file_exists($path)) { require $path; }
});
