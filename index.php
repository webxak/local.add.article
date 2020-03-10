<?php
mb_internal_encoding('utf-8');
error_reporting(-1);
session_start();
//подключение файлов
require_once __DIR__ . '/config/conf.php';
require_once __DIR__ . '/config/attr.php';
require_once __DIR__ . '/libs/funct.php';
require_once __DIR__ . '/app/autoload.php';
//подключение маршрутизатора
echo \app\core\Router::run();
