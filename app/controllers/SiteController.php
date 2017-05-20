<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 19:38
 */
namespace app\controllers;

use app\models\LoginForm;
use myframework\Controller;

class SiteController extends Controller
{
    public $layout = "login";

    /**
     * Главная страница
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        $this->layout = "main";
        $this->render('index');
//        $this->redirect("/page/index");
    }

    /**
     * Вход в систему
     *
     * @throws \Exception
     */
    public function loginAction()
    {
        $model = new LoginForm($this->app);

        if ($model->load($_POST) && $model->login()) {
            $this->redirect("/site/index");
        }

        $this->render('login', ['model' => $model]);
    }

    /**
     * Выход из системы
     */
    public function logoutAction()
    {
        unset($_SESSION["userId"]);

        $this->redirect("/site/login");
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