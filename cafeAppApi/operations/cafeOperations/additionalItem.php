<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/cafe.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new CafeOwner($db);
$details->owner_mob = isset($_GET['owner_mob']) ? $_GET['owner_mob'] : die();
// query cafes
$stmt = $details->readAdditionalItems();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    $details_arr = array();
    $details_arr["aditionalItems"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id"=>$id,
            "ownerPhone" => $owner_mob,
            "itemName" => $item,
            "price"=> $price,
           
        );

        array_push($details_arr['aditionalItems'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No items found.")
    );
}