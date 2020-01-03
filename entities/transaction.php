<?php

class Transaction
{

    // Connection instance
    public $id;

    // table name
    public $comment;

    // table columns
    public $price;
    public $quantity;
    public $reason;
    public $createdAt;
    public $updatedAt;
    public $product_id;
    private $connection;
    private $table_name = "Transaction";

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
        #oquery = "SELECT c.name as family_name, p.id, p.sku, p.barcode, p.name, p.price, p.unit, p.quantity , p.minquantity, p.createdAt, p.updatedAt, p.locationid FROM " . $this->table_name . " p LEFT JOIN Family c ON p.id = c.id ORDER BY p.createdAt DESC";
        $query = "SELECT  " .

            "
t.id as trxn_id, t.comment as trxn_comment, t.price as trxn_price, t.quantity as trxn_quantity, t.reason as trxn_reason, t.createdAt as trxn_createdAt, t.updatedAt as trxn_updatedAt, t.productid as trxn_productid, " .
            " 
p.id as prod_id, p.sku as prod_sku, p.barcode as prod_barcode, p.name as prod_name, p.price as prod_price, p.unit as prod_unit, p.quantity as prod_quantity, p.familyid as prod_family_id,
 " .
            " 
f.reference as fmly_reference, f.name as fmly_name 
 " .
            " FROM " . $this->table_name . " t  LEFT JOIN Product p ON t.productid = p.id LEFT JOIN Family f ON p.familyid = f.id ORDER BY t.createdAt DESC";
        #$query = "SELECT * FROM " . $this->table_name . " t  LEFT JOIN Product p ON t.productid = p.id ORDER BY t.createdAt DESC";

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
