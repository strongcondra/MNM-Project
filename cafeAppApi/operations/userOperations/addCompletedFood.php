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
$arr=$_POST;
$data=json_encode($arr);
$userData = json_decode($data);



if (
    !empty($userData->foodName) &&
    !empty($userData->placeName) &&
    !empty($userData->cost) && 
    !empty($userData->reservations)&&
    !empty($userData->image)
) {
    $user->user_id = $userData->id;
    $user->user_mobile = $userData->phone;
    $user->place_name = $userData->placeName;
    $user->food_name = $userData->foodName;
    $user->cost = $userData->cost;
    $user->reservations = $userData->reservations;
    $user->food_image = $userData->image;
    $user->food_description = $userData->description;
    $user->date = $userData->date;
    $user->time = $userData->time;


    if ($user->createCompletedFood()) {
        http_response_code(201);
        echo json_encode(array("message" => "COMPLETED FOOD BOOKING WAS SUCCESSFUL"));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "an error encountered when creating BOOKED FOOD ITEM"));
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "booking was not created, incomplete data"));
}
