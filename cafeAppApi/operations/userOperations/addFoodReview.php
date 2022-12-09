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
    !empty($userData->userName) &&
    !empty($userData->phoneNumber) &&
    // !empty($userData->review) &&
    !empty($userData->rating) &&
    !empty($userData->profileImage) &&
    !empty($userData->foodName)
) {
    $user->user_name = $userData->userName;
    $user->user_about = $userData->about;
    $user->user_mobile = $userData->phoneNumber;
    $user->review = $userData->review;
    $user->rating = $userData->rating;
    $user->profilePicture = $userData->profileImage;
    $user->food_name = $userData->foodName;

    if ($user->createFoodReview()) {
        http_response_code(201);
        echo json_encode(array("message" => "review item was created."));
    } else {
        http_response_code(404);
        echo json_encode(array(
            "message" => "an error encountered when adding the review",
            "response" => http_response_code(), 
            
        ));
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "incomplete data, review was not created"));
}
