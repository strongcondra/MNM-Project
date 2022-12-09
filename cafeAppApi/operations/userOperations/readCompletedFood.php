<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/users.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new Users($db);
$details->user_id = isset($_GET['id']) ? $_GET['id'] : die();
// query users
$stmt = $details->readCompletedFoods();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["completedFoods"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id"=>$id,
            "foodId"=>$food_id,
            "phone" => $userMobile,
            "placeName" => $placeName,
            "foodName" => $foodName,
            "cost"=>$cost,
            "reservations"=>$reservations,
            "image"=>$image,
            "description"=>$foodDescription
        );

        array_push($details_arr['completedFoods'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No completed foods found.")
    );
}
  