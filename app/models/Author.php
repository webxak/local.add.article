<?php

namespace app\models;

use app\core\Model;

/**
 * записывает данные из формы в свойста
 * protected $fname - имя автора
 * protected $sname - фамилия автора
 * protected $email - почта автора
 * Class Author
 * @package app\models
 */

class Author extends Model
{
    protected $fname;
    protected $sname;
    protected $email;

    public function __construct(array $post = [])
    {
        $this->id = isset($post['id']) ? (int) $post['id'] : null;
        $this->fname = $post['fname'];
        $this->sname = $post['sname'];
        $this->email = $post['email'];
    }
}
