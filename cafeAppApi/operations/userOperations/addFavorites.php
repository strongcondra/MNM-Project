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
    !empty($userData->name) &&
    !empty($userData->favorite) && 
    !empty($userData->description)&&
    !empty($userData->image)&&
    !empty($userData->phone)
) {
    $user->favorite_name = $userData->name;
    $user->favorite_image = $userData->image;
    $user->favorite_description = $userData->description;
    $user->favorite = $userData->favorite;
    $user->user_mobile = $userData->phone;

    if ($user->createFavorites()) {
        http_response_code(201);
        echo json_encode(array("message" => "favorite item was created."));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "an error encountered when adding to favorites"));
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "incomplete data, booking was not created"));
}
