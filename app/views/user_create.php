<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.05.2017
 * Time: 12:49
 */

/** @var $model \app\models\User */
?>
<div class="row">
    <div class="col-md-12">
        <h1><?= $model->id ? "Редактирование" : "Создание" ?> пользователя</h1>
        <form action="" class="jumbotron" method="post">

            <?php if ($model->hasError()) : ?>
                <div class="alert alert-danger">
                    <?= join("<br>", $model->getErrors()) ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="login">Логин</label>
                <input class="form-control" id="login" name="login" placeholder="Логин" required
                       value="<?= $model->login ?>">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input class="form-control" id="password" name="password" placeholder="Пароль" required
                       value="<?= $model->password ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary text-center">Сохранить</button>
            </div>
        </form>
    </div>
</div>