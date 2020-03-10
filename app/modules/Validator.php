<?php

namespace app\modules;

/**
 * Этот класс проводит проверку полученных данных из класса Registry
 * содержит методы
 * validEmpty - проверка на пустоту данных
 * getError - возвращает массив ошибок
 * clearData - очищает данные от тегов
 * validate - обарбатывает данные полученные из формы
 * Class Validator
 * @package app\modules
 */

class Validator
{
    private static $error = [];

    /**
     * проверяем на пустоту полученные данные,
     * если пусто, записываем в массив ошибок сообщение
     * @param array $data
     */
    private static function validEmpty(array $data)
    {
        foreach ($data as $key => $elem) {
            if ('date' === $key) { continue; }
            if (!empty($elem) == '') { self::$error[$key] = ATTRIBUTES['empty'][$key]; }
        }
    }

    /**
     * обарбатывает данные полученные из формы
     * @param array $data
     */
    public static function validate(array $data = [])
    {
        self::validEmpty($data);
    }

    /**
     * возвращает массив ошибок
     * @return array
     */
    public static function getError()
    {
        return self::$error;
    }

    /**
     * очистка данных от тегов
     * @param array $data
     * @return array
     */
    public static function clearData(array $data = [])
    {
        foreach ($data as $key => $elem) {
            $data[$key] = strip_tags(htmlspecialchars(trim($elem)));
        }
        return $data;
    }
}
