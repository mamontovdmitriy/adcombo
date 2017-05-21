<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 7:58
 */
namespace myframework;

use myframework\Application;

class DbModel extends Model
{
    /** @var string Название таблицы */
    protected $tableName = "";

    /**
     * Поиск по ID и загрузка в модель
     *
     * @param $id
     * @return bool
     */
    public function find($id)
    {
        $sql = "SELECT * FROM `{$this->tableName}` WHERE `id` = ?";

        $res = $this->app->db->query($sql, $id);

        if ($res->rowCount() != 1) {
            return false;
        }

        $data = $res->fetch();
        $this->load($data);

        return true;
    }

    /**
     * Выбор всех записей
     *
     * @return array
     */
    public function findAll()
    {
        $data = [];

        $sql = "SELECT * FROM `{$this->tableName}`";
        $res = $this->app->db->query($sql);
        while ($row = $res->fetch()) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * Удаление записи по ID
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `{$this->tableName}` WHERE `id` = ?";

        $this->app->db->query($sql, $id);

        return true;
    }
}