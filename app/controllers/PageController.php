<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 19:38
 */
namespace app\controllers;

use app\helpers\Alias;
use app\models\Page;
use app\models\User;
use myframework\Controller;

class PageController extends Controller
{
    public $layout = "main";
    /**
     * Список страниц
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        $this->render("page_index", ['page' => new Page($this->app)]);
    }

    /**
     * Смотреть страницу
     *
     * @throws \Exception
     */
    public function viewAction()
    {
        $model = new Page($this->app);

        $model->find((int) $this->app->request->getParam('id'));

        $this->render("page_view", ['model' => $model]);
    }

    /**
     * Создать страницу
     *
     * @throws \Exception
     */
    public function createAction()
    {
        $model = new Page($this->app);

        if ($model->load($_POST)) {
            $model->generateAlias();
            $model->created = date("Y-m-d H:i:s");
            if ($model->save()) {
                $this->redirect("/page/index");
            }
        }

        $this->render("page_create", ['model' => $model, 'user' => new User($this->app)]);
    }

    /**
     * Редактировать страницу
     */
    public function updateAction()
    {
        $model = new Page($this->app);

        $model->find((int) $this->app->request->getParam('id'));

        if ($model->load($_POST)) {
            $model->generateAlias();
            if ($model->save()) {
                $this->redirect("/page/index");
            }
        }

        $this->render("page_create", ['model' => $model, 'user' => new User($this->app)]);
    }

    /**
     * Удалить страницу
     */
    public function deleteAction()
    {
        $model = new Page($this->app);

        $model->delete((int) $this->app->request->getParam('id'));

        $this->redirect("/page/index");
    }


    /**
     * Примитивная авторизация
     *
     * @param $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!isset($_SESSION["userId"]) && ($action != "login")) {
                $this->redirect("/site/login");
            }
            return true;
        }
        return false;
    }
}