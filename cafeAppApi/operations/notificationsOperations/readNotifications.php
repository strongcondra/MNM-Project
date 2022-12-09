<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/notifications.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new Notifications($db);
$details->user_mobile = isset($_GET['user_mobile']) ? $_GET['user_mobile'] : die();
// query users
$stmt = $details->readNotifications();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["notifications"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id"=>$id,
            "notification" => $notification,
            "phoneNumber" => $user_mobile,
            "dateCreated"=> $dateCreated,
        );
        array_push($details_arr['notifications'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No user found.")
    );
}
  

