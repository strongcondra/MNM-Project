<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//added this for the sake of testing
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/cafe.php';

// db connection
$database = new CafeDb();
$db = $database->getConnection();
$user = new CafeOwner($db);

//handle json data
$data = json_decode(file_get_contents("php://input"));
$user->owner_email = $data->email;

// set user property values RHS
// $user->owner_name = $data->name;
$user->owner_email = $data->email;
// $user->owner_mob = $data->phone;
// $user->owner_upi = $data->upi;
$user->cafe_name = $data->cafeName;
$user->owner_upi = $data->ownerUpi;
$user->location = $data->location;
$user->cafe_cost = $data->cafeCost;
$user->description = $data->description;
$user->service_area = $data->serviceArea;
$user->facilities = $data->facilities;
$user->primary_image = $data->primaryImage;
$user->secondary = $data->secondary;
$user->status = $data->status;

if ($user->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "User was updated."));
} else {

    http_response_code(503);
    echo json_encode(array("message" => "Unable to update user."));
}
