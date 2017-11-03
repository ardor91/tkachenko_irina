<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/bus.php';

$database = new Database();
$db = $database->getConnection();

$bus = new Bus($db);

$keywords=isset($_GET["s"]) ? $_GET["s"] : "";

$stmt = $bus->search_by_id($keywords);
$num = $stmt->rowCount();

if($num>0){
    $buses_arr=array();
    $buses_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $bus_item=array(
            "bus_id" => $bus_id,
            "number" => $number,
        );
        array_push($buses_arr["records"], $bus_item);
    }

    echo json_encode($buses_arr);
}

else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>