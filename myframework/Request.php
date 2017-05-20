<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 17:28
 */
namespace myframework;

class Request
{
    /** Методы запроса */
    const METHOD_GET = "GET";
    const METHOD_POST = "POST";


    private $params = [];


    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function getCookie($name, $default = null)
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }

        return $default;
    }

    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function getPost($name, $default = null)
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }

        return $default;
    }

    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function getQuery($name, $default = null)
    {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }

        return $default;
    }

    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function getServer($name, $default = null)
    {
        if (isset($_SERVER[$name])) {
            return $_SERVER[$name];
        }

        return $default;
    }

    /**
     * @return null|string
     */
    public function getUri()
    {
        $uri = $this->getServer('REQUEST_URI', '/');
        if ($pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        return $uri;
    }

    /**
     * @return null
     */
    public function getMethod()
    {
        return $this->getServer('REQUEST_METHOD', self::METHOD_GET);
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return strtoupper($this->getMethod()) == self::METHOD_POST;
    }

    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function getParam($name, $default = null)
    {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        }

        return $default;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }

}