<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../entities/location.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$location = new Location($connection);

$stmt = $location->read();
$count = $stmt->rowCount();

#print "Returned Rows = " . $count . " .\n" ;

if ($count > 0) {


    $locations = array();
    $locations["body"] = array();
    $locations["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $p = array(
            "id" => $id,
            "reference" => $reference,
            "description" => $description,
            "createdAt" => $createdAt,
            "updatedAt" => $updatedAt
        );

        array_push($locations["body"], $p);
    }

    echo json_encode($locations);
} else {

    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}
?>
