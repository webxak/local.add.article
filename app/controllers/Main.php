<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Article;
use app\models\Author;
use app\modules\Validator;

/**
 * Контроллер, служит связующим звеном
 * между видом и моделью
 * получает данных и передает их модели для обработки
 * подключает нужный вид на вывод
 * actionIndex - подключает вид главной старницы
 * actionAddAuthor - подключает вид формы добавления автора
 * actionAddArticle - подключает вид формы добавления статьи
 * Class Main
 * @package app\controllers
 */

class Main extends Controller
{
    /**
     * подключает вид главной старницы
     * выводит статьи на страницу
     * @return false|mixed|string
     */
    public function actionIndex()
    {
        //получаем все статьи и авторов
        $articles = Article::findArticle();
        return $this->view->render('main',
            [
                'title' => 'Главная',
                'footer' => '© 2020 web-разработка',
                'articles' => $articles,
            ]);
    }

    /**
     * подключает вид формы добавления автора
     * передает полученные данные модели для обработки
     * и записи в нужную таблицу
     * @return false|string
     */
    public function actionAddAuthor()
    {
        if (!empty($_POST)) {
            $post = Validator::clearData($_POST);
            Validator::validate($post);

            if (!Validator::getError()) {
                $author = new Author($post);
                $author->insert('author');
                $_SESSION['success'] = ADDAUTHOR;
            } else {
                $_SESSION['error'] = Validator::getError();
            }
            redirect();
        }
        return $this->view->render('add-author',
            [
                'title' => 'Добавить автора',
                'footer' => '© 2020 web-разработка',
            ]);
    }

    /**
     * подключает вид формы добавления статьи
     * передает полученные данные модели для обработки
     * и записи в нужную таблицу
     * @return false|string
     */
    public function actionAddArticle()
    {
        if (!empty($_POST)) {
            $post = Validator::clearData($_POST);
            Validator::validate($post);

            if (!Validator::getError()) {
                $article = new Article($post);
                $articleId = $article->insert('article');
                $article->addId('relation', $post['author'], $articleId);
                $_SESSION['success'] = ADDART;
            } else {
                $_SESSION['error'] = Validator::getError();
            }
            redirect();
        }

        $authors = Author::findAll('author');
        return $this->view->render('add-article',
            [
                'title' => 'Добавить статью',
                'footer' => '© 2020 web-разработка',
                'authors' => $authors,
            ]);
    }
}
