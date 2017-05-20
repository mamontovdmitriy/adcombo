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

    protected $tableName = "user";

}