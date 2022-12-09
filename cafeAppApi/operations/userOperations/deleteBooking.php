<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../config/database.php';
include_once '../../objects/users.php';
  
// get database connection
$database = new CafeDb();
$db = $database->getConnection();
  
// prepare product object
$user = new Users($db);
  
$data = json_decode(file_get_contents("php://input"));
$user->booking_id = $data->id;
  
if($user->deleteBooking()){
    http_response_code(200);
    echo json_encode(array("message" => "booking was deleted."));
}
else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to delete booking."));
}
