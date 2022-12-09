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
$pdo = $database->conn;


if (
    !empty($userData->paymentMode) &&
    !empty($userData->foodTotal) &&
    !empty($userData->reservationCost) &&
    !empty($userData->reservations) &&
    !empty($userData->totalOrder)&&
    !empty($userData->phoneNumber)

) {
    $user->user_mobile = $userData->phoneNumber;
    $user->payMode = $userData->paymentMode;
    $user->foodTotal = $userData->foodTotal;
    $user->reservationCost = $userData->reservationCost;
    $user->reservations = $userData->reservations;
    $user->totalOrder = $userData->totalOrder;
    $user->orderStatus = $userData->orderStatus;
    $user->place_name = $userData->placeName;
    $user->booking_image = $userData->placeImage;

    if ($user->createOrder()) {
        http_response_code(201);
        echo json_encode(array("message" => "order was created successfully","id" => $pdo->lastInsertId()));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "an error encountered when creating the order"));
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "incomplete data, order was not created"));
}
