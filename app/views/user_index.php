<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.05.2017
 * Time: 22:13
 */

/** @var $model \app\models\User */
?>
<h1>Пользователи</h1>
<a class="btn btn-primary pull-right" href="/user/create"><i class="glyphicon glyphicon-plus"></i> Создать</a>

<table class="table ">
    <thead>
    <tr>
        <th>ID</th>
        <th>Логин</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model->findAll() as $aUser): ?>
        <tr>
            <td><?= $aUser['id'] ?></td>
            <td><?= $aUser['login'] ?></td>
            <td>
                <a href="/user/password/id/<?= $aUser['id'] ?>"
                   title="Новый пароль"><i class="glyphicon glyphicon-pencil"></i></a>
                <?php if ($_SESSION['userId'] != $aUser['id']) : ?>
                    <a href="/user/delete/id/<?= $aUser['id'] ?>"
                       title="Удаление"><i class="glyphicon glyphicon-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>