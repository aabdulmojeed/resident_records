<?php

class Database
{
    private $DB_FILENAME = '../crms.db';

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("sqlite:$this->DB_FILENAME");
            $version = $this->conn->exec("SELECT SQLITE_VERSION()");
            echo $version."\n";
        } catch (PDOException $exception) {
            echo "Error connecting to DB: " . $exception->getMessage();
        }
        return $this->conn;
    }
}