<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 21:29
 */
namespace app\models;

use myframework\Model;

class LoginForm extends Model
{
    public $login;
    public $password;

    /**
     * Аутентификация
     *
     * @return bool
     */
    public function login()
    {
        $sql = "SELECT * FROM `user` WHERE login = ? AND password = SHA1(?)";

        $res = $this->app->db->query($sql, $this->login, $this->password);

        if ($res->rowCount() == 1) {
            $user = $res->fetch();
            $_SESSION["userId"] = $user['id'];

            return true;
        }

        $this->addError("Логин и пароль не опознаны!");
        return false;
    }
}