<?php

#This is a new transaction - whatever2
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../entities/transaction.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$transaction = new Transaction($connection);

$stmt = $transaction->read();
$count = $stmt->rowCount();

print "3Newly Returned Rows = " . $count . " .\n" ;

if ($count > 0) {


    $transactions = array();
    $transactions["body"] = array();
    $transactions["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $t = array(
            "trxn_id" => $trxn_id,
            "trxn_comment" => $trxn_comment,
            "trxn_price" => $trxn_price,
            "trxn_quantity" => $trxn_quantity,
            "trxn_reason" => $trxn_reason,
            "trxn_createdAt" => $trxn_createdAt,
            "trxn_updatedAt" => $trxn_updatedAt,
            "trxn_productid" => $trxn_productid,
            "prod_sku" => $prod_sku,
            "prod_name" => $prod_name,
            "prod_price" => $prod_price,
            "prod_unit" => $prod_unit,
            "fmly_reference" => $fmly_reference,
            "fmly_name" => $fmly_name
        );

        array_push($transactions["body"], $t);
    }

    echo json_encode($transactions);
} else {

    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}
?>
