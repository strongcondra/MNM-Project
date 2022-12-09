<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/cafe.php';
//gets a single cafe
// get database connection
$database = new CafeDB();
$db = $database->getConnection();
$details = new CafeOwner($db);

$details->cafe_name = isset($_GET['cafe_name']) ? $_GET['cafe_name'] : die();

$details->readCafeImages();
$details_arr = array();
$details_arr["images"] = array();

if ($details->cafe_name != null) {
    $details_item = array(
        "id" =>  $details->image_id,
        "userName" => $details->cafe_name,
        "image_1" => $details->image_1,
        "image_2" => $details->image_2,
        "image_3" => $details->image_3,
        "image_4" => $details->image_4,
        "image_5" => $details->image_5,
        "image_6" => $details->image_6,
        "image_7" => $details->image_7,
        "image_8" => $details->image_8,
        "image_9" => $details->image_9,
        "image_10" => $details->image_10,
        "image_11" => $details->image_11,
        "image_12" => $details->image_12,
        "image_13" => $details->image_13,
        "image_14" => $details->image_14,
        "image_15" => $details->image_15,


    );
    array_push($details_arr['images'], $details_item);

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "image details does not exist."));
}
