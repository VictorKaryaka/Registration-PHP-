<?php

class Countries
{
    private $pdo;

    /**
     * Countries constructor.
     */
    public function __construct()
    {
        $connector = new DatabaseConnector('config.ini');
        $this->pdo = $connector->getConnection();
    }

    /**
     * @return array
     *
     * The function return array of countries
     */
    public function getAll()
    {
        $sql = 'SELECT country_name FROM COUNTRIES;';
        $state = $this->pdo->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}