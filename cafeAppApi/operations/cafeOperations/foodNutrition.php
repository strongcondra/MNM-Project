<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/cafe.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new CafeOwner($db);
$details->cafe_name = isset($_GET['cafe_name']) ? $_GET['cafe_name'] : die();
$details->food_name = isset($_GET['food_name']) ? $_GET['food_name'] : die();
// query cafes
$stmt = $details->readFoodNutrition();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["nutrition"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id"=>$id,
            "name" => $name,
            "quantity" => $quantity,
            "food"=> $food,
            "restaurant"=> $restaurant
        );

        array_push($details_arr['nutrition'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No menu types options found.")
    );
}
  