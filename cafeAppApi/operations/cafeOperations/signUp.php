

<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// get database connection
include_once '../../config/database.php';
include_once '../../objects/cafe.php';

$database = new CafeDB();
$db = $database->getConnection();
$user = new CafeOwner($db);
$userData = json_decode(file_get_contents("php://input"));


if (
    !empty($userData->owner_name) &&
    !empty($userData->owner_pass) &&
    !empty($userData->owner_mob) &&
    !empty($userData->owner_email)
) {
    $user->owner_name = $userData->owner_name;
    $user->owner_pass = $userData->owner_pass;
    $user->owner_email = $userData->owner_email;
    $user->owner_mob = $userData->owner_mob;
    $user->cafe_name = $userData->cafeName;
    $user->owner_upi = $userData->owner_upi;
    $user->location = $userData->location;
    $user->cost = $userData->cost;
    $user->description = $userData->description;
    $user->service_area = 0;
    $user->facilities = $userData->facilities;
    $user->primary_image = $userData->primary_image;
    $user->secondary = $userData->secondary;
    $user->status = 0;
    $user->longitude = $userData->longitude;
    $user->latitude = $userData->latitude;
    $user->capacity = $userData->capacity;
    $user->trending = $userData->trending;
    $user->full_reservation = $userData->fullReservation;
    $user->individual_reservation = $userData->individaulReservation;
    $user->information = $userData->information;
    $user->category = $userData->category;
    $user->cuisine = $userData->cuisine;

    if ($user->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "User was created."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "error encountered while creating the user"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create user. Incomplete data"));
}
