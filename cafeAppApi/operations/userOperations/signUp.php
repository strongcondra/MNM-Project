<?php
header("Access-Control-Allow-Origin: http://localhost:8000/cafeAppApi/");
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

//gets the json data and logs in a user if they are available in database

if (
    // !empty($userData->names) &&
    // !empty($userData->email) &&
    // !empty($userData->password) &&
    !empty($userData->phone)
) {
    // $user->user_name = "";
    $user->password = "";
    // $user->user_email = "";
    $user->user_mobile = $userData->phone;
    $user->user_address = "";
    $user->user_img = "";
    $user->user_status = "0";
    $user->user_about = "";
    // $user->card_number = "";
    // $user->card_expiry = "";
    // $user->cvc = "";

    if ($user->createUser()) {
        http_response_code(201);
        echo json_encode(
            array(
                "message" => "User was created.",
                "id" => $pdo->lastInsertId(),
                "phone" => $userData->phone
            )
        );
    } else {
        http_response_code(404);
        echo json_encode(
            array(
                "message" => "the user exists already", 
                "phone" => $userData->phone
            )
        );
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "incomplete data"));
}