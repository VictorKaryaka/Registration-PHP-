<?php

class Invites extends DatabaseConnector
{
    /**
     * @return bool
     *
     * The function return invite status
     */
    public function inviteStatus($invite)
    {
        $sql = 'SELECT status FROM INVITES WHERE invite = ?;';
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($invite));
        $row = $statement->fetch(PDO::FETCH_LAZY);

        return ($row['status'] == "1") ? false : true;
    }

    /**
     * Update invite status in database
     */
    public function statusUpdate($invite)
    {
        $sql = 'UPDATE INVITES SET status = "1", date_status = TIMESTAMP(CURRENT_TIMESTAMP()) WHERE invite = ?;';
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($invite));
    }

    /**
     * @return array
     *
     * The function return array of invites
     */
    public function getAll()
    {
        $sql = 'SELECT * FROM INVITES;';
        $state = $this->connection->query($sql);
        $rows = $state->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}