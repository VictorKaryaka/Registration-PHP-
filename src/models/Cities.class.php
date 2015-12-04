<?php

class Cities
{
    private $pdo;

    /**
     * Cities constructor.
     */
    public function __construct()
    {
        $connector = new DatabaseConnector('config.ini');
        $this->pdo = $connector->getConnection();
    }

    /**
     * @return array
     *
     * The function return array of cities
     */
    public function getCities(){
        $sql = 'SELECT city_name FROM CITIES ORDER BY id_country; ';
        $state = $this->pdo->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}