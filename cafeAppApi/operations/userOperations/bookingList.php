<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/users.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new Users($db);
$details->user_mobile = isset($_GET['user_mobile']) ? $_GET['user_mobile'] : die();
// query users
$stmt = $details->readBookings();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["bookings"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id"=>$booking_id,
            "phone" => $user_mobile,
            "placeName" => $place_name,
            "payMode"=> $pay_mode,
            "date"=> $date,
            "complementary" => $complementary,
            "cancelled" => $cancelled,
            "status"=>$status,
            "cost"=>$cost,
            "reservations"=>$reservations,
            "image"=>$image,
            "ownerMobile"=>$owner_mob
        );

        array_push($details_arr['bookings'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No user found.")
    );
}
  

