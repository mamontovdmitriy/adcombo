<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.05.2017
 * Time: 20:52
 */

/** @var $model \app\models\LoginForm */
?>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <form action="" class="jumbotron" method="post" style="margin-top: 100px">
            <div class="form-group">
                <label for="login">Логин</label>
                <input class="form-control" id="login" name="login" placeholder="Ваш логин" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input class="form-control" id="password" name="password" placeholder="Ваш пароль"
                       type="password" required>
            </div>

            <?php if ($model->hasError()) : ?>
                <div class="alert alert-danger">
                    <?= join("<br>", $model->getErrors()) ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <button type="submit" class="btn btn-primary text-center">Войти</button>
            </div>
        </form>
    </div>
</div>
