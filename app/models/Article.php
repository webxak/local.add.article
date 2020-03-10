<?php

namespace app\models;

use app\core\Model;
use app\modules\Translite;

/**
 * записывает данные из формы в свойста
 * protected $url - ulr статьи
 * protected $title - заголовок
 * protected $text - текст
 * protected $date - дата
 * protected $active - активна да/нет
 * Class Article
 * @package app\models
 */

class Article extends Model
{
    protected $url;
    protected $title;
    protected $text;
    protected $date;
    protected $active;

    public function __construct(array $post = [])
    {
        $this->id = isset($post['id']) ? (int) $post['id'] : null;
        $this->title = $post['title'];
        $this->text = $post['text'];
        $this->date = !empty($post['date']) ? $post['date'] : null;
        $this->active = !empty($post['active']) ? 2 : 1;
        $this->url = Translite::translite($this->title);
    }
}
