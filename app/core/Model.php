<?php

namespace app\core;

use app\modules\ErrorHandler;

/**
 * отвечает за обработку данных полученных
 * из контроллера
 * формирует запросы к бд
 * findAll - запрос на выбор всех данных из таблицы
 * findArticle - выбирает данные из указанных таблиц
 * insert - добавляет новую запись в таблицу
 * addId - связывает статью с автором
 * Class Model
 * @package app\core
 */

abstract class Model
{
    protected $id;

    /**
     * запрос на выбор всех данных из таблицы
     * согластно полученным параметрам
     * принемает
     * название таблицы
     * и параметры
     * @param $table
     * @param array $params
     * @param string $where
     * @return array|bool
     */
    public static function findAll($table, array $params = [], $where = '')
    {
        $sql = 'SELECT * FROM `' . DSN['prefix'] . $table . '`';
        if (!empty($where)) { $sql .= ' WHERE ' . $where; }

        try {
            $dbh = DAtabase::instance();
            return $dbh->queryALL(
                $sql,
                $params
            );

        } catch (\PDOException $e) {
            $msg = 'Ошибка запроса findAll';
            ErrorHandler::logError(LOGS . 'sqlfile.txt', $msg, $e);
        }
    }

    /**
     * выбирает данные из указанных таблиц
     * для вывода на главной странице
     * @return array|bool
     */
    public static function findArticle()
    {
        $sql = 'SELECT *, DATE_FORMAT(date, \'%d.%m.%Y\') as new_date FROM xxx_article a
                LEFT JOIN xxx_relation r
                ON a.id = r.article_id
                LEFT JOIN xxx_author
                ON xxx_author.id = r.author_id';

        try {
            $dbh = Database::instance();
            return $dbh->queryAll(
                $sql
            );

        } catch (\PDOException $e) {
            $msg = 'Ошибка запроса findArticle';
            ErrorHandler::logError(LOGS . 'sqlfile.txt', $msg, $e);
        }
    }

    /**
     * добавляет новую запись в таблицу
     * принемате назавние таблицы
     * @param $table
     * @return string
     */
    public function insert($table)
    {
        $obj = get_object_vars($this);
        $columns = [];
        $params = [];

        foreach ($obj as $key => $elem) {
            if ('id' === $key) { continue; }
            $columns[] = $key;
            $params[':'.$key] = $elem;
        }

        $sql = 'INSERT INTO `' . DSN['prefix'] . $table . '`'
            . '(`' . implode('`, `', $columns) . '`)'
            . ' VALUES '
            . '(' . implode(', ', array_keys($params)) . ')';

        try {
            $dbh = Database::instance();
            return $dbh->execute(
                $sql,
                $params
            );

        } catch (\PDOException $e) {
            $msg = 'Ошибка запроса insert';
            ErrorHandler::logError(LOGS . 'sqlfile.txt', $msg, $e);
        }
    }

    /**
     * связывает статью с автором
     * принемает парамтры
     * назавние таблицы
     * id - автора
     * id - статьи
     * @param $table
     * @param $authorId
     * @param $articleId
     * @return string
     */
    public function addId($table, $authorId, $articleId)
    {
        $sql = 'INSERT INTO `' . DSN['prefix'] . $table . '`'
            . '(`author_id`, `article_id`) VALUES (:author_id, :article_id)';

        try {
            $dbh = Database::instance();
            return $dbh->execute(
                $sql,
                [
                    ':author_id' => $authorId,
                    ':article_id' => $articleId,
                ]
            );

        } catch (\PDOException $e) {
            $msg = 'Ошибка запроса addId';
            ErrorHandler::logError(LOGS . 'sqlfile.txt', $msg, $e);
        }
    }
}
