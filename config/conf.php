<?php
/**
 * системные настройки
 */
define('DSN', [
    'dsn' => 'mysql:host=localhost;dbname=crud;charset=utf8',
    'username' => 'root',
    'password' => '',
    'prefix' => 'xxx_',
]);

define('ROOT', dirname(__DIR__) . '/');
define('LAYOUTS', ROOT . 'views/layouts/');
define('SITE', ROOT . 'views/site/');
define('INC', ROOT . 'views/inc/');
define('LOGS', ROOT . 'logs/');

define('CLASS_PATH', 'app\controllers\\');
define('ACTION', 'action');

define('EXP', '.php');

$path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
define('PATH', $path);
