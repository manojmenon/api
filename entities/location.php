<?php

class Location
{

    // Connection instance
    public $id;

    // table name
    public $reference;

    // table columns
    public $description;
    public $createdAt;
    public $updatedAt;
    private $connection;
    private $table_name = "Location";

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    //C
    public function create()
    {
    }

    //R
    public function read()
    {

        $query = "SELECT * FROM " . $this->table_name . " l  ORDER BY l.createdAt DESC";

        // $query = "SELECT * FROM " . $this->table_name . "  ORDER BY createdAt DESC";

#print "Executing query $query \n" ;
        try {
            $stmt = $this->connection->prepare($query);

            $stmt->execute();

            return $stmt;
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }

    //U
    public function update()
    {
    }

    //D
    public function delete()
    {
    }
}
