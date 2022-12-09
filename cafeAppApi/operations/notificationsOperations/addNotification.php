<?php
header("Access-Control-Allow-Origin: http://localhost:8000/cafeAppApi/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// get database connection
include_once '../../config/database.php';
include_once '../../objects/notifications.php';

$database = new CafeDB();
$db = $database->getConnection();
$notification = new Notifications($db);
$notificationData = json_decode(file_get_contents("php://input"));
$pdo = $database->conn;

//gets the json data and logs in a user if they are available in database

if (
    !empty($notificationData->notification)
) {

    $notification->notification = $notificationData->notification;
    $notification->user_mobile = $notificationData->phoneNumber;

    if ($notification->create()) {
        http_response_code(201);
        echo json_encode(
            array(
                "message" => "Notification was created.",
                "id" => $pdo->lastInsertId(),
                "notification" => $notificationData->notification
            )
        );
    } else {
        http_response_code(404);
        echo json_encode(
            array(
                "message" => "the user exists already",
            )
        );
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "incomplete data"));
}
