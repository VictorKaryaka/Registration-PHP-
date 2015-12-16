<?php

class DatabaseConnector
{
    protected $connection;

    /**
     * DatabaseConnector constructor.
     */
    public function __construct()
    {
        $path_to_config = $_SERVER['DOCUMENT_ROOT'] . '/Registration/config.ini';
        $config = parse_ini_file($path_to_config) or die('File config.ini not found');

        $dsn = 'mysql' . ':host=' . $config['db_host'] . ';dbname=' . $config['db_name'];
        try {
            $this->connection = new PDO($dsn, $config['db_user'], $config['db_pass']);
        } catch (PDOException $ex) {
            echo('MySQL connection error: ' . $ex->getMessage());
        }
    }
}