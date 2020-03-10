<?php

namespace app\core;

use app\modules\ErrorHandler;

/**
 * Класс подключения к базе данных
 * содержит методы
 * instance - создание одного экземпляра класса
 * execute - insert, update, delete
 * queryAll - select
 * queryOne - select
 * Class Database
 * @package app\core
 */

class Database
{
    private $dbh;
    private static $instance = null;

    /**
     * @return Database|null
     */
    public static function instance()
    {
        if (null === self::$instance) { self::$instance = new self(); }
        return self::$instance;
    }

    private function __construct()
    {
        try {
            $this->dbh = new \PDO(DSN['dsn'], DSN['username'], DSN['password'],
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ]);

        } catch (\PDOException $e) {
            $msg = 'Ошибка подключения к бд';
            ErrorHandler::logError(LOGS . 'dbfile.txt', $msg, $e);
            throw new \PDOException("Нет соединения с БД", 500);
        }
    }

    /**
     * метод для insert, update, delete
     * @param $sql
     * @param array $params
     * @return string
     */
    public function execute($sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $this->dbh->lastInsertId();
    }

    /**
     * метод выбирает все записи из таблицы
     * согласно переданным параметрам
     * @param $sql
     * @param array $params
     * @return array|bool
     */
    public function queryAll($sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if (false !== $res) {
            return $sth->fetchAll(
                \PDO::FETCH_ASSOC
            );
        }
        return false;
    }

    /**
     * метод выбирает записи из таблицы
     * согласно переданным параметрам
     * @param $sql
     * @param array $params
     * @return bool|mixed
     */
    public function queryOne($sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if (false !== $res) {
            return $sth->fetch(
                \PDO::FETCH_ASSOC
            );
        }
        return false;
    }
}
