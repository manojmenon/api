<?php

## This is a test file I want to change this file - v4
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../entities/product.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$product = new Product($connection);

$stmt = $product->read();
$count = $stmt->rowCount();

#print "Returned Rows = " . $count . " .\n" ;

if ($count > 0) {


    $products = array();
    $products["body"] = array();
    $products["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $p = array(
            "id" => $id,
            "sku" => $sku,
            "barcode" => $barcode,
            "name" => $name,
            "price" => $price,
            "unit" => $unit,
            "quantity" => $quantity,
            "minquantity" => $minquantity,
            "createdAt" => $createdAt,
            "createdAt" => $createdAt,
            "updatedAt" => $updatedAt,
            "id" => $id,
            "location_id" => $locationid
        );

        array_push($products["body"], $p);
    }

    echo json_encode($products);
} else {

    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}
?>
