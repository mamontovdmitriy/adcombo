<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 7:58
 */
namespace myframework;

use myframework\Application;

class Model
{
    /** @var \myframework\Application */
    protected $app;

    /** @var array Ошибки */
    private $_errors;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Загрузить данные в паблик свойства модели
     *
     * @param array $data
     * @return bool
     */
    public function load(array $data)
    {
        $success = false;

        $properties = (new \ReflectionObject($this))->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($properties as $property) {
            if (isset($data[$property->name])) {
                $this->{$property->name} = $data[$property->name];
                $success = true;
            }
        }

        return $success;
    }

    /**
     * Валидация
     *
     * @return bool
     */
    public function validate()
    {
        return !$this->hasError();
    }

    /**
     * Добавить ошибку
     *
     * @param $error
     */
    public function addError($error)
    {
        $this->_errors[] = $error;
    }

    /**
     * Проверить есть ли ошибки
     *
     * @return bool
     */
    public function hasError()
    {
        return !empty($this->_errors);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @param $errors
     * @return $this
     */
    public function setErrors($errors)
    {
        $this->_errors = $errors;

        return $this;
    }
}