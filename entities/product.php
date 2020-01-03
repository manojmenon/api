<?php

class Product
{

    // Connection instance
    public $id;

    // table name
    public $sku;

    // table columns
    public $barcode;
    public $name;
    public $price;
    public $unit;
    public $quantity;
    public $minquantity;
    public $createdAt;
    public $updatedAt;
    public $family_id;
    public $location_id;
    private $connection;
    private $table_name = "Product";

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
        $query = "SELECT c.name as family_name, p.id, p.sku, p.barcode, p.name, p.price, p.unit, p.quantity , p.minquantity, p.createdAt, p.updatedAt, p.locationid FROM " . $this->table_name . " p LEFT JOIN Family c ON p.id = c.id ORDER BY p.createdAt DESC";

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
