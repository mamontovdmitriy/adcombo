<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 7:58
 */
namespace myframework;

/**
 * Class Application
 * @package myframework
 */
class Application
{
    /* Настройки приложения */
    public $controller = "app\\controllers";
    public $appPath = __DIR__;
    public $viewPath = "views";
    public $layoutPath = "views/layouts";

    /** @var Db */
    public $db;

    /** @var Request */
    public $request;

    public $controllerName;

    public $actionName;


    /** @var array */
    private $_config;

    /** @var Router */
    private $_router;


    public function __construct($config)
    {
        session_start();

        $this->_config = $config;

        if (isset($this->_config['db'])) {
            $this->db = new Db($this->_config['db']);
            $this->db->connect();
        }

        $this->request = new Request();
        $this->_router = new Router($this->request);

    }

    /**
     * Запуск приложения
     */
    public function run()
    {
        try {
            $this->_router->parseUri();

            $this->controllerName = $this->_router->getControllerName();

            $controller = $this->getControllerByName($this->controllerName);

            if (method_exists($controller, 'init')) {
                $controller->init($this);
            }

            $this->actionName = $this->_router->getActionName();

            $action = $this->getActionByName($controller, $this->actionName);

            if (method_exists($controller, 'beforeAction')) {
                if (!$controller->beforeAction($this->actionName)) {
                    return;
                }
            }

            echo call_user_func([$controller, $action]);
        }
        catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    /**
     * Создать экземпляр класса контроллера по имени
     *
     * @param $controllerName
     * @return mixed
     * @throws \Exception
     */
    protected function getControllerByName($controllerName)
    {
        $class = trim($this->controller, "\\") . "\\" . $controllerName . 'Controller';
        if (class_exists($class)) {
            return new $class();
        }
        throw new \Exception("Страница не существует!", 404);
    }

    /**
     * Получить по имени экшн из контроллера
     *
     * @param $controller
     * @param $actionName
     * @return string
     * @throws \Exception
     */
    protected function getActionByName($controller, $actionName)
    {
        $method = $actionName . 'Action';
        if (method_exists($controller, $method)) {
            return $method;
        }
        throw new \Exception("Страница не существует!", 404);
    }
}