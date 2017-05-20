<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 20:52
 */

/** @var $page \app\models\Page */
?>
<h1>Страницы</h1>
<a class="btn btn-primary pull-right" href="/page/create"><i class="glyphicon glyphicon-plus"></i> Создать</a>

<table class="table ">
    <thead>
    <tr>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Алиас</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($page->findAll() as $aPage): ?>
    <tr>
        <td><?= $aPage['id'] ?></td>
        <td><?= strip_tags($aPage['title']) ?></td>
        <td><?= strip_tags($aPage['alias']) ?></td>
        <td>
            <a href="/page/view/id/<?= $aPage['id'] ?>"
               title="Просмотр"><i class="glyphicon glyphicon-eye-open"></i></a>
            <a href="/page/update/id/<?= $aPage['id'] ?>"
               title="Редактирование"><i class="glyphicon glyphicon-pencil"></i></a>
            <a href="/page/delete/id/<?= $aPage['id'] ?>"
               title="Удаление"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
