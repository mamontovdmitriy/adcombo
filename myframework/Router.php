<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 8:41
 */
namespace myframework;

class Router
{
    public $controller = 'Site';
    public $action = 'index';

    private $_request;


    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    /**
     * Разбор URI
     */
    public function parseUri()
    {
        $uri = $this->_request->getUri();
        $uri = trim($uri, '/');
        $parts = explode('/', $uri);

        if (!empty($parts[0])) {
            $this->setControllerName($parts[0]);
        }

        if (!empty($parts[1])) {
            $this->setActionName($parts[1]);
        }

        $count = count($parts);
        if (count($parts) > 2) {
            for ($i = 2; $i < $count; $i += 2) {
                if (!isset($parts[$i + 1])) {
                    break;
                }

                $name = urldecode($parts[$i]);
                $value = urldecode($parts[$i + 1]);
                $this->_request->setParam($name, $value);
            }
        }
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        return $this->controller;
    }

    /**
     * @param $controller
     * @return $this
     */
    public function setControllerName($controller)
    {
        $controller = preg_replace('/[^A-Za-z0-9]*/', '', $controller);
        $controller = strtolower($controller);
        $this->controller = ucfirst($controller);

        return $this;
    }

    /**
     * @return string
     */
    public function getActionName()
    {
        return $this->action;
    }

    /**
     * @param $action
     * @return $this
     */
    public function setActionName($action)
    {
        $action = preg_replace('/[^A-Za-z0-9]*/', '', $action);
        $action = strtolower($action);
        $this->action = $action;

        return $this;
    }

}