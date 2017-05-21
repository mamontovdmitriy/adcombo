<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.05.2017
 * Time: 22:51
 */
namespace app\models;

use myframework\DbModel;

class User extends DbModel
{
    public $id;
    public $login;
    public $password;

    protected $tableName = "user";

    /**
     * Валидация данных модели
     *
     * @return bool
     */
    public function validate()
    {
        if (!$this->login) {
            $this->addError('Заполните обязательное поле "Логин"!');
        }
        if (strlen($this->login) > 255) {
            $this->addError('Поле "Логин" должно содержать не более 255 символов!');
        }
        if (!preg_match('/^[a-zA-Z\d-_]+$/', $this->login)) {
            $this->addError('Поле "Логин" содержит запрещенные символы!');
        }
        // todo нужна проверка на уникальность

        return !$this->hasError();
    }

    /**
     * Сохранение данных
     *
     * @return bool
     */
    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        if ($this->id) {

            $sql = "UPDATE `{$this->tableName}` SET `login` = ? WHERE `id` = ?";

            $this->app->db->query($sql, $this->login, $this->id);

            return true;

        } else {

            $sql = "INSERT INTO `{$this->tableName}` (`login`, `password`) VALUES(?, SHA1(?))";

            $this->app->db->query($sql, $this->login, $this->password);

            $lastInsertId = $this->app->db->instance->lastInsertId();

            return $this->find($lastInsertId);
        }
    }
}