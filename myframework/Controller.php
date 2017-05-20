<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 7:58
 */
namespace myframework;

class Controller
{
    /** @var Application */
    public $app;

    /** @var string */
    public $layout;

    public function beforeAction($action)
    {
        return true;
    }

    public function init(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Редирект
     *
     * @param $url
     */
    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }

    /**
     * Вывод представления
     *
     * @param $view
     * @param array $args
     * @throws \Exception
     */
    public function render($view, $args = [])
    {
        $fileView = $this->app->appPath . DIRECTORY_SEPARATOR .
            $this->app->viewPath . DIRECTORY_SEPARATOR .
            $view . ".php";
        if (!file_exists($fileView)) {
            throw new \Exception("Представление '$fileView' не найдено!");
        }

        extract($args);

        ob_start();
        require($fileView);
        $content = ob_get_clean();

        if ($this->layout === false) {
            echo $content;
            exit;
        }
        elseif ($this->layout == '') {
            $fileLayout = $this->app->appPath . DIRECTORY_SEPARATOR . $this->app->layoutPath . DIRECTORY_SEPARATOR
                . "main.php";
        }
        else {
            $fileLayout = $this->app->appPath . DIRECTORY_SEPARATOR . $this->app->layoutPath . DIRECTORY_SEPARATOR
                . $this->layout . ".php";
        }

        if (file_exists($fileLayout)) {
            require($fileLayout);
            exit;
        }
        throw new \Exception("ex");
    }

}