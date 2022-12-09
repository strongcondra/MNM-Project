<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/users.php';

// get database connection
$database = new CafeDb();
$db = $database->getConnection();
$user = new Users($db);

$data = json_decode(file_get_contents("php://input"));

// set product property values
// $user->user_mobile = $data->phone;

// $user->user_name = $data->name;
// $user->place_name = $data->placeName;
// $user->payMode = $data->payMode;
// $user->complementary = $data->complementary;
// $user->cancelled = $data->cancelled;
// $user->status = $data->status;
$user->booking_id = $data->id;
$user->reservations = $data->reservations;
$user->cost = $data->cost;


// update the product
if ($user->updateBooking()) {
    echo json_encode(http_response_code());
    http_response_code(200);
    echo json_encode(array("message" => "booking hj updated."));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update user."));
}
