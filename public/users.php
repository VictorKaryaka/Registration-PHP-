<?php

include_once '../autoloader.php';
spl_autoload_register('autoload');

$users = new Users(null, null, null, null, null);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>
    <link rel="icon" type="public/image/gif" href="./images/ajb.gif">
    <link href="css/registration.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="back">
    <a href="../index.php"><img src="images/back-min.png"></a>
</div>
<div align="center">
    <img src="images/Users-icon.png">

    <div id="users">
        <h1><strong>Пользователи</strong></h1>
    </div>
    <table id="table" border="solid 1px">
        <tr>
            <td><h4>&nbsp&nbsp № &nbsp&nbsp</h4></td>
            <td><h4>&nbsp&nbsp Имя пользователя &nbsp&nbsp</h4></td>
        </tr>
        <?
        foreach ($users->getAll() as $k => $v) {
            echo '<tr>';
            echo '<td>' . '<h4>' . ($k += 1) . '.</h4>' . '</td>';
            foreach ($v as $key => $value) {
                if ($key == 'login') {
                    echo '<td>' . '<h4>' . $value . '</h4>' . '</td>';
                    echo '</tr>';
                }
            }
        }
        ?>
    </table>
</div>
</body>
</html>
