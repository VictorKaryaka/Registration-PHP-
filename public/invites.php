<?php
include_once '../src/models/Invites.class.php';
include_once '../src/util/DatabaseConnector.class.php';

$invites = new Invites(null);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Инвайты</title>
    <link rel="icon" type="public/image/gif" href="./images/ajb.gif">
    <link href="css/registration.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="back">
    <a href="../index.php"><img src="images/back-min.png"></a>
</div>
<div align="center">
    <img id="invites-page" src="images/invites.png">

    <div id="users">
        <h1><strong>Инвайт коды</strong></h1>
    </div>
    <table id="table" border="solid 1px">
        <tr>
            <td><h4>&nbsp&nbspИнвайт код&nbsp&nbsp</h4></td>
            <td><h4>&nbsp&nbspСтатус&nbsp&nbsp</h4></td>
            <td><h4>Дата</h4></td>
        </tr>
        <?
        foreach ($invites->getAll() as $k => $v) {
            echo '<tr>';
            foreach ($v as $key => $value) {
                echo '<td>' . '<h4>' . '&nbsp' . $value . '&nbsp' .'</h4>' . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</div>
</body>
</html>
