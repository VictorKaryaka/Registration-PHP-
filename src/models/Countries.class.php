<?php

class Countries extends DatabaseConnector
{
    /**
     * @return array
     *
     * The function return array of countries
     */
    public function getAll()
    {
        $sql = 'SELECT country_name FROM COUNTRIES;';
        $state = $this->connection->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}