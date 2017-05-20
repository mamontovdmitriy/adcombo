<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 8:33
 */
namespace myframework;

class Db
{
    /** @var  \PDO */
    public $instance;

    /** @var  array */
    private $options;


    public function __construct($options)
    {
        $defaults = [
            'host' => 'localhost',
            'port' => '3306',
            'user' => '',
            'password' => '',
            'dbname' => '',
        ];

        $options = array_merge($defaults, $options);

        foreach ($options as $name => $value) {
            $this->setOption($name, $value);
        }
    }

    /**
     * @param $name
     * @param null $default
     * @return null
     */
    public function getOption($name, $default = null)
    {
        if (isset($this->options[$name])) {
            return $this->options[$name];
        }

        return $default;
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;

        return $this;
    }

    /**
     * Подключить БД
     *
     * @return $this
     */
    public function connect()
    {
        $dsn = sprintf(
            'mysql:dbname=%s;host=%s;port=%u;',
            $this->getOption('dbname'),
            $this->getOption('host'),
            $this->getOption('port')
        );

        $this->instance = new \PDO($dsn, $this->getOption('user'), $this->getOption('password'), [
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
        ]);

        return $this;
    }

    /**
     * Выполнить запрос к БД
     *
     * @return \PDOStatement
     */
    public function query()
    {
        $args = func_get_args();

        $sql  = array_shift($args);

        $sth = $this->instance->prepare($sql);
        $sth->execute($args);

        return $sth;
    }

}