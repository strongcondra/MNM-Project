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
    !empty($userData->foodName) &&
    !empty($userData->placeName) &&
    !empty($userData->cost) && 
    !empty($userData->reservations)&&
    !empty($userData->image)
) {
    $user->user_mobile = $userData->phone;
    $user->place_name = $userData->placeName;
    $user->food_name = $userData->foodName;
    $user->cost = $userData->cost;
    $user->reservations = $userData->reservations;
    $user->food_image = $userData->image;
    $user->food_description = $userData->description;


    if ($user->createFoodBooking()) {
        http_response_code(201);
        echo json_encode(array("message" => "booking was created."));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "an error encountered when creating user"));
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "booking was not created, incomplete data"));
}
