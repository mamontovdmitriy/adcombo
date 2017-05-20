<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.05.2017
 * Time: 22:49
 */

/** @var $model \app\models\Page */
/** @var $user \app\models\User */
?>
<div class="row">
    <div class="col-md-12">
        <h1><?= $model->id ? "Редактирование" : "Создание" ?> страницы</h1>
        <form action="" class="jumbotron" method="post">

            <?php if ($model->hasError()) : ?>
                <div class="alert alert-danger">
                    <?= join("<br>", $model->getErrors()) ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input class="form-control" id="title" name="title" placeholder="Заголовок страницы" required
                       value="<?= $model->title ?>">
            </div>
            <div class="form-group">
                <label for="text">Текст</label>
                <textarea class="form-control" id="text" name="text" placeholder="Текст" rows="6"
                          required><?= $model->text ?></textarea>
            </div>
            <div class="form-group">
                <label for="user">Автор</label>
                <select id="user" class="form-control" name="user_id">
                <?php foreach ($user->findAll() as $aUser): ?>
                    <option value="<?= $aUser['id'] ?>" <?= $model->user_id == $aUser['id'] ? "selected" : "" ?>
                            ><?= $aUser['login'] ?></option>
                <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary text-center">Сохранить</button>
            </div>
        </form>
    </div>
</div>