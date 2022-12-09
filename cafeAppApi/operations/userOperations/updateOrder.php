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

$user->id = $data->id;
$user->orderStatus = $data->status;
// update the product
if ($user->updateOrder()) {
    http_response_code(200);
    echo json_encode(array("message" => "ORDER UPDATE SUCCESSFUL"));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "UNABLE TO UPDATE THE ORDER."));
}
