<?php

namespace app\core;

/**
 * обрабатывает полученный url для подключения
 * нужных классов и запуска методов
 * run - определяет нужный класс и метод
 * upperString - формируем имя метода
 * Class Router
 * @package app\core
 */

class Router
{
    private static $controller = 'Main';
    private static $action = 'index';

    /**
     * определяет нужный класс и метод
     * согласно полученного url
     * @return mixed
     */
    public static function run()
    {
        $url = rtrim($_SERVER['QUERY_STRING'], '/');
        if ($url) { self::$action = $url; }
        $className = CLASS_PATH . self::$controller;
        $controller = new $className();
        //установка по умолчанию action - index, если его нет
        if (!isset(self::$action)) { self::$action = 'index'; }
        $method = ACTION . self::upperString(self::$action);
        if (!method_exists($controller, $method)) {
            http_response_code('404');
            require_once SITE . '404' . EXP;
        } else {
            return $controller->$method();
        }
    }

    /**
     * формируем имя метода
     * add-author => AddAuthor
     * @param $name
     * @return string|string[]
     */
    private static function upperString($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
}
