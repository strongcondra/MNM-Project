<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/users.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new Users($db);
$details->user_mobile = isset($_GET['user_mobile']) ? $_GET['user_mobile'] : die();
// query users
$stmt = $details->readFoodBookings();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["foodBookings"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id"=>$id,
            "phone" => $userMobile,
            "placeName" => $placeName,
            "foodName" => $foodName,
            "cost"=>$cost,
            "reservations"=>$reservations,
            "image"=>$image,
            "description"=>$foodDescription
        );

        array_push($details_arr['foodBookings'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No user found.")
    );
}
  