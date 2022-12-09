<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// get database connection
include_once '../../config/database.php';
include_once '../../objects/users.php';

$database = new CafeDB();
$db = $database->getConnection();

$user = new Users($db);

$userData = json_decode(file_get_contents("php://input"));


if (
    !empty($userData->phone) &&
    !empty($userData->placeName) &&
    !empty($userData->cost) && 
    !empty($userData->reservations)&&
    !empty($userData->image)&&
    !empty($userData->ownerMobile)
) {
    $user->user_mobile = $userData->phone;
    $user->place_name = $userData->placeName;
    $user->payMode = "PayUmoney";
    $user->complementary = "1";
    $user->cancelled = "0";
    $user->status = "0";
    $user->cost = $userData->cost;
    $user->reservations = $userData->reservations;
    $user->booking_image = $userData->image;
    $user->owner_mob = $userData->ownerMobile;


    if ($user->createUserBooking()) {
        http_response_code(201);
        echo json_encode(array("message" => "booking was created."));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "an error encountered when creating user"));
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "incomplete data, booking was not created"));
}
