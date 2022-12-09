<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/cafe.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new CafeOwner($db);

// query users
$stmt = $details->readReviews();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["placeReviews"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
           "id"=>$id,
            "userName"=>$user_name,
            "about"=>$user_about,
            "phoneNumber" => $user_mobile,
            "review" => $review,
            "rating" => $rating,
            "userImage"=>$user_img,
            "placeName"=>$place_name,
        );

        array_push($details_arr['placeReviews'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No user found.")
    );
}
  

