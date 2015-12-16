<?php

class Registration
{
    public static function run()
    {
        $validator = new \application\Validator();

        if ($validator->isLoginOrPasswordValid($_POST['login'])) {
            $login = $_POST['login'];
        } else {
            self::sendError();
            return;
        }

        if ($validator->isLoginOrPasswordValid($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            self::sendError();
            return;
        }

        if ($validator->isPhoneValid($_POST['phone'])) {
            $phone = $_POST['phone'];
        } else {
            self::sendError();
            return;
        }

        if (!isset($_POST['country'])) {
            self::sendError();
            return;
        }

        if (isset($_POST['city'])) {
            $city = $_POST['city'];
        } else {
            self::sendError();
            return;
        }

        if ($validator->isInviteValid($_POST['invite'])) {
            $invite = $_POST['invite'];
        } else {
            self::sendError();
            return;
        }

        $users = new Users($login, $password, $phone, $city, $invite);
        $users->save();
    }

    private function sendError()
    {
        header("HTTP/1.1 403 Forbidden");
        header("Location: ../../public/403-forbidden.html");
    }
}