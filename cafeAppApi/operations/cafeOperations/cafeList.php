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
$stmt = $details->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["places"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "cafeid" => $cafe_id,
            "cafeName" => $cafe_name,
            "ownerName"=>$owner_name,
            "password"=> $owner_pass,
            "emailAddress" => $owner_email,
            "mobilePhone" => $owner_mob,
            "payment"=>$owner_upi,
            "location"=>$location,
            "cost"=>$cost,
            "description"=>$description,
            "service_area"=>$service_area,
            "facilities"=>$facilities,
            "primary_image"=>$primary_image,
            "secondary"=>$primary_image,
            "status"=>$status,
            "latitude"=>$latitude,
            "longitude"=>$longitude,
            "information"=>$information,
            "reservation"=>$full_reservation,
            "individual_booking"=>$individual_reservation,
            "capacity"=>$capacity,
            "trending"=>$trending, 
            "category"=>$category,
            "popular" => $popular,
            "address"=>$address,
            "photoShoot"=>$photoShoot,
            "cake"=>$cake,
            "apiKey"=>$apiKey,
            "authToken"=>$authToken
        );

        array_push($details_arr['places'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No user found.")
    );
}
  

