<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/route.php';

$database = new Database();
$db = $database->getConnection();

$route = new Route($db);

$keywords=isset($_GET["s"]) ? $_GET["s"] : "";

$stmt = $route->search_by_number($keywords);
$num = $stmt->rowCount();

if($num>0){
    $routes_arr=array();
    $routes_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $route_item=array(
            "route_id" => $route_id,
            "number" => $number,
        );
        array_push($routes_arr["records"], $route_item);
    }

    echo json_encode($routes_arr);
}