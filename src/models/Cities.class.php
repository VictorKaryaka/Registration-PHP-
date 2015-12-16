<?php

class Cities extends DatabaseConnector
{
    /**
     * @return array
     *
     * The function return array of cities
     */
    public function getCities(){
        $sql = 'SELECT city_name FROM CITIES ORDER BY id_country; ';
        $state = $this->connection->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}