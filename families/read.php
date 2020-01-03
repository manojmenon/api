<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../entities/family.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$family = new Family($connection);

$stmt = $family->read();
$count = $stmt->rowCount();

print "Returned Rows = " . $count . " .\n" ;

if ($count > 0) {


    $families = array();
    $families["body"] = array();
    $families["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $p = array(
            "id" => $id,
            "reference" => $reference,
            "name" => $name,
            "createdAt" => $createdAt,
            "updatedAt" => $updatedAt
        );

        array_push($families["body"], $p);
    }

    echo json_encode($families);
} else {

    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}
?>
