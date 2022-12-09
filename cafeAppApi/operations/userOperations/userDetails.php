<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/users.php';
  //gets a single cafe
// get database connection
$database = new CafeDB();
$db = $database->getConnection();
$details = new Users($db);
  
$details->user_id = isset($_GET['user_mobile']) ? $_GET['user_mobile'] : die();
  
$details->readOne();
$details_arr = array();
$details_arr["user"] = array();

if($details->user_id!=null){
    $details_item = array(
        "id" =>  $details->user_id,
        "userName" => $details->user_name,
        "password" => $details->password,
        "email" => $details->user_email,
        "phoneNumber" => $details->user_mobile,
        "image" => $details->user_img,
        "user_address" => $details->user_address,
        "status" => $details->user_status,
        "addon"=>$details->user_addon,
        "about"=>$details->user_about,
        // "cardNumber"=>$details->card_number,
        // "cardExpiry"=>$details->card_expiry,
        // "cvc"=>$details->cvc

        
    );
    array_push($details_arr['user'], $details_item);

    http_response_code(200);
    echo json_encode($details_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "user does not exist."));
}
