<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.05.2017
 * Time: 22:51
 */
namespace app\models;

use app\helpers\Alias;
use myframework\DbModel;

class Page extends DbModel
{
    public $id;
    public $title;
    public $alias;
    public $text;
    public $user_id;
    public $created;
    public $updated;

    protected $tableName = "page";

    /**
     * Валидация данных модели
     *
     * @return bool
     */
    public function validate()
    {
        if (!$this->title) {
            $this->addError('Заполните обязательное поле "Заголовок"!');
        }
        if (strlen($this->title) > 255) {
            $this->addError('Поле "Заголовок" должно содержать не более 255 символов!');
        }

        if (!$this->text) {
            $this->addError('Заполните обязательное поле "Текст"!');
        }
        if (strlen($this->title) > 65535) {
            $this->addError('Поле "Текст" должно содержать не более 65535 символов!');
        }

        if (!$this->user_id) {
            $this->addError('Заполните обязательное поле "Автор"!');
        }

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

            $sql = "UPDATE `page` SET `title` = ?, `alias` = ?, `text` = ?, `user_id` = ? WHERE `id` = ?";

            $this->app->db->query($sql, $this->title, $this->alias, $this->text, $this->user_id, $this->id);

            return true;

        } else {

            $sql = "INSERT INTO `page` (`title`, `alias`, `text`, `user_id`, `created`) VALUES(?, ?, ?, ?, ?)";

            $this->app->db->query($sql, $this->title, $this->alias, $this->text, $this->user_id, $this->created);

            $lastInsertId = $this->app->db->instance->lastInsertId();

            return $this->find($lastInsertId);

        }
    }


    /**
     * Генерирование уникального алиаса
     */
    public function generateAlias()
    {
        $alias = Alias::generate(trim($this->title));

        $sql = "SELECT * FROM `page` WHERE `alias` = ?";
        $res = $this->app->db->query($sql, $alias);

        $newAlias = $alias;
        for ($i = 1; $res->rowCount() > 0; $i++) {
            $newAlias = $alias . "_" . $i;
            $res = $this->app->db->query($sql, $newAlias);
        }

        $this->alias = $newAlias;
    }
}