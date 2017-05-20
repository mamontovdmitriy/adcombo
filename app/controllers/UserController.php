<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.05.2017
 * Time: 22:13
 */
namespace app\controllers;

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
        $this->render("user_index");
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