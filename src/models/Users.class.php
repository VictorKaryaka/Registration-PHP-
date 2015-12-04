<?php

class Users
{
    private $login;
    private $password;
    private $phone;
    private $id_city;
    private $invite;

    private $pdo;

    /**
     * Users constructor.
     * @param $login
     * @param $password
     * @param $phone
     * @param $invite
     */
    public function __construct($login, $password, $phone, $city, $invite)
    {
        $connector = new DatabaseConnector();
        $this->pdo = $connector->getConnection();

        $this->login = $login;
        $this->password = $password;
        $this->phone = $phone;
        $this->id_city = $this->getIdCity($city);
        $this->invite = $invite;
    }

    /**
     * The function save new user in database
     */
    public function save()
    {
        if (!$this->isHasLogin($this->login)) {
            $invite = new Invites();
            if ($invite->inviteStatus($this->invite)) {
                $sql = 'INSERT INTO USERS (login, password, phone, id_city, invite) VALUES (?, ?, ?, ?, ?)';
                $statement = $this->pdo->prepare($sql);
                $statement->execute(array($this->login, md5($this->password), $this->phone, $this->id_city, $this->invite));

                $invite->statusUpdate($this->invite);
            } else {
                echo json_encode(array('notice' => 'Ошибка: введенный инвайт-код зарегестрирован на другого пользователя'));
                return;
            }

            echo json_encode(array('notice' => 'Пользователь успешно добавлен!'));
            return;
        }
        echo json_encode(array('notice' => 'Ошибка: попытка добавления существующего пользователя'));
    }

    /**
     * @return array
     *
     * The function return array of users
     */
    public function getAll()
    {
        $sql = 'SELECT login, id_city, invite FROM USERS;';
        $state = $this->pdo->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    /**
     * @param $city
     * @return mixed
     *
     * The function return id of the city
     */
    private function getIdCity($city)
    {
        $sql = 'SELECT id_city FROM CITIES WHERE city_name = ' . "'$city'" . ';';
        $statement = $this->pdo->query($sql);
        $a = $statement->fetch(PDO::FETCH_COLUMN);
        return $a;
    }

    /**
     * @param $login
     * @return bool
     *
     * The function check the login in database
     */
    private function isHasLogin($login)
    {
        $sql = 'SELECT login FROM USERS WHERE login = ' . "'$login'" . ';';
        $statement = $this->pdo->query($sql);
        $row = $statement->fetch(PDO::FETCH_LAZY);

        return (is_bool($row)) ? false : true;
    }
}