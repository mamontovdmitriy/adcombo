<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.05.2017
 * Time: 19:23
 */

spl_autoload_register();

$config = require(__DIR__ . '/config.php');

$application = new \app\Application($config);
$application->run();