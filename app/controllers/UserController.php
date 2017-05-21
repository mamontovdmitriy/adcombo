<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.05.2017
 * Time: 22:13
 */
namespace app\controllers;

use app\models\User;
use myframework\Controller;

class UserController extends Controller
{
    /**
     * Список пользователей
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        $model = new User($this->app);

        $model->find((int) $this->app->request->getParam('id'));

        $this->render("user_index", ['model' => $model]);
    }

    /**
     * Создать пользователя
     *
     * @throws \Exception
     */
    public function createAction()
    {
        $model = new User($this->app);

        if ($model->load($_POST)) {
            if ($model->save()) {
                $this->redirect("/user/index");
            }
        }

        $this->render("user_create", ['model' => $model]);
    }

    /**
     * Удалить пользователя
     */
    public function deleteAction()
    {
        $model = new User($this->app);

        $id = (int) $this->app->request->getParam('id');
        if ($_SESSION['userId'] != $id) {
            $model->delete($id);
        }

        $this->redirect("/user/index");
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