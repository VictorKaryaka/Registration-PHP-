<?php

class Invites
{
    private $pdo;

    /**
     * Invites constructor.
     * @param $invite
     */
    public function __construct()
    {
        $connector = new DatabaseConnector();
        $this->pdo = $connector->getConnection();
    }

    /**
     * @return bool
     *
     * The function return invite status
     */
    public function inviteStatus($invite)
    {
        $sql = 'SELECT status FROM INVITES WHERE invite = ' . $invite . ';';
        $statement = $this->pdo->query($sql);
        $row = $statement->fetch(PDO::FETCH_LAZY);

        return ($row['status'] == "1") ? false : true;
    }

    /**
     * Update invite status in database
     */
    public function statusUpdate($invite)
    {
        $sql = 'UPDATE INVITES SET status = "1", date_status = TIMESTAMP(CURRENT_TIMESTAMP()) WHERE invite = ' . "'$invite'" . ';';
        $this->pdo->query($sql);
    }

    /**
     * @return array
     *
     * The function return array of invites
     */
    public function getAll()
    {
        $sql = 'SELECT * FROM INVITES;';
        $state = $this->pdo->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}