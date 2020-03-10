<?php

namespace app\core;

/**
 * абстрактный класс
 * подключает вид
 * подключает шабон вида
 * абстрактный метод actionIndex
 * Class Controller
 * @package app\core
 */

abstract class Controller
{
    protected $view;
    protected $default = LAYOUTS . 'define';

    public function __construct()
    {
        $this->view = new View($this->default);
    }

    /**
     * @return mixed
     */
    abstract public function actionIndex();
}
