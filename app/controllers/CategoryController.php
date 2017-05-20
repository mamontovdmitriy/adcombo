<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 19:38
 */
namespace app\controllers;

use myframework\Controller;

class CategoryController extends Controller
{
    /**
     * Список категорий - каталог
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        $this->render("category_index");
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