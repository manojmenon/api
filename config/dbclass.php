<?php

class DBClass
{
## This is the first change
    public $connection;
    private $host = "192.168.0.7";
    private $username = "root";
    private $password = "Pattana3jm!";
    private $database = "mydb";

    // get the database connection

    public function getConnection()
    {

        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }

        return $this->connection;
    }
}

?>
