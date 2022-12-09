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
  
$details->cafe_id = isset($_GET['cafe_id']) ? $_GET['cafe_id'] : die();
  
$details->readOne();
  
if($details->owner_name!=null){
    $details_arr = array(
        "cafeid" =>  $details->cafe_id,
        "userName" => $details->owner_name,
        "password" => $details->owner_pass,
        "email" => $details->owner_email,
        "phoneNumber" => $details->owner_mob,
        "payment" => $details->owner_upi,
        "location" => $details->location,
        "cafe_cost" => $details->cafe_cost,
        "description" => $details->description,
        "service_area" => $details->service_area,
        "facilities" => $details->facilities,
        "primary_image" => $details->primary_image,
        "secondary" => $details->secondary,
        "status" => $details->status
        
    );
    http_response_code(200);
    echo json_encode($details_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "cafe does not exist."));
}
