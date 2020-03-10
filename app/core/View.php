<?php

namespace app\core;

/**
 * Формирует вид на вывод
 * render - формируем вид шаблона на вывод
 * getTemplate - определяет какой шаблон подключать
 * Class View
 * @package app\core
 */

class View
{
    private $default;

    public function __construct($default)
    {
        $this->default = (string) $default;
    }

    /**
     * формируем вид шаблона на вывод
     * @param $template
     * @param array $data
     * @return false|string
     */
    public function render($template, array $data = [])
    {
        ob_start();
        extract($data);
        $default = $this->getTemplate($this->default);
        include $default;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * определяет какой шаблон подключать
     * по умоланию или нет
     * @param $default
     * @return string
     */
    private function getTemplate($default)
    {
        $file = $default. EXP;
        if (!file_exists($file)) {
            return LAYOUTS . 'default' . EXP;
        } else {
            return $file;
        }
    }
}
