<?php

class Family
{

    // Connection instance
    public $id;

    // table name
    public $reference;

    // table columns
    public $name;
    public $createdAt;
    public $updatedAt;
    private $connection;
    private $table_name = "Family";

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

        $query = "SELECT * FROM " . $this->table_name . " f  ORDER BY f.createdAt DESC";

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
