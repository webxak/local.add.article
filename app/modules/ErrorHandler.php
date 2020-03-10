<?php

namespace app\modules;

/**
 * Класс записывает ошибки в файл
 * содержит метод
 * logError - записывает данные в файл
 * Class ErrorHandler
 * @package app\modules
 */

class ErrorHandler
{
    /**
     * записвывает полученные данные в файл
     * @param string $file путь файла
     * @param string $msg сообщение
     * @param string $e ошибки
     */
    public static function logError($file = '', $msg = '', $e = '')
    {
        $message = "{$msg}\n"
            . date('d-m-Y H:i:s')
            . "\nТекст ошибки: " . $e->getMessage()
            . "\nФайл: " . $e->getFile()
            . "\nСтрока: " . $e->getLine()
            . "\nКод: " . $e->getCode()
            . "\n=========\n";
        file_put_contents($file, $message, FILE_APPEND);
    }
}
