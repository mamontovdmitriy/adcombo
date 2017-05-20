<?php
/** @var $this \myframework\Controller */
/** @var $content string */
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="navbar navbar-inverse " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Test Project for Adcombo</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= $this->app->controllerName == "Site" ? "active" : "" ?>">
                    <a href="/site/index">Главная</a></li>
                <li class="<?= $this->app->controllerName == "Page" ? "active" : "" ?>">
                    <a href="/page/index">Страницы</a></li>
                <li class="<?= $this->app->controllerName == "Category" ? "active" : "" ?>">
                    <a href="/category/index">Каталог</a></li>
                <li class="<?= $this->app->controllerName == "User" ? "active" : "" ?>">
                    <a href="/user/index">Пользователи</a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
                <li><a href="/site/logout">Выйти</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
<?= $content ?>
</div>
</body>
</html>