<?php
    include_once('autoloader.php');
    spl_autoload_register('autoload');
    $cities = new Cities();
    $countries = new Countries();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="icon" type="public/image/gif" href="./images/ajb.gif">
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/registration.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="starter-template">
        <div id = "notice" align="center" class="alert alert-info" role="alert"></div>
        <h1 align="center"><strong>Регистрация</strong></h1>
        <hr align="center" width="300" color="black"/>

        <form id="form-signin" class="form-signin">
            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Логин</span>
                <input type="text" id="login" class="form-control" placeholder="Введите логин">
            </div>
            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Пароль</span>
                <input type="password" id="password" class="form-control"
                       placeholder="Введите пароль">
            </div>
            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Еще раз пароль</span>
                <input type="password" id="pass_again" class="form-control"
                       placeholder="Введите еще раз пароль">
            </div>
            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Телефон</span>
                <input type="tel" id="phone" class="form-control" aria-describedby="basic-addon1"
                       placeholder="Введите номер телефона">
            </div>
            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Страна</span>
                <select id="country" class="form-control">
                    <option value='select'>Выберите страну</option>
                    <?php
                        foreach ($countries->getAll() as $k => $v) {
                            foreach ($v as $key => $value) {
                                echo('<option value="' . $k . '">' . $value . '</option>');
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Город</span>
                <select id="city" class="form-control">
                    <option value='select'>Выберите город</option>
                    <?php
                    foreach ($cities->getCities() as $k => $v) {
                        foreach ($v as $key => $value) {
                            echo('<option value="' . $k . '">' . $value . '</option>');
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="input-group groups div-names">
                <span class="input-group-addon span-names">Инвайт</span>
                <input type="text" id="invite" class="form-control"
                       placeholder="Введите инвайт код">
            </div>

            <div class="btn-toolbar buttons_reg" role="group">
                <button type="button" class="btn btn-default btn-lg custom-buttons" id="registration">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbspРегистрация&nbsp&nbsp&nbsp
                </button>

                <button type="button" class="btn btn-default btn-lg" id="clear">
                    <span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Очистить&nbsp&nbsp&nbsp&nbsp&nbsp
                </button>
            </div>

            <div class="btn-toolbar buttons_reg" role="group">
                <button type="button" class="btn btn-default btn-lg custom-buttons" id="users">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Пользователи
                </button>

                <button type="button" class="btn btn-default btn-lg" id="invites">
                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Инвайты&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                </button>
            </div>
        </form>
    </div>
</div>
</body>
<script src="public/js/jquery-2.1.4.min.js" rel="script"></script>
<script src="public/js/actions.js" rel="script"></script>
<script src="public/js/validator.js" rel="script"></script>
<script src="public/js/notify.min.js" rel="script"></script>
<script src="public/bootstrap/js/bootstrap.min.js" rel="script"></script>
</html>