<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/admin.php';

$database = new CafeDB();
$db = $database->getConnection();

$details = new Admin($db);

// query users
$stmt = $details->readPlacesQuestions();
$num = $stmt->rowCount();

if ($num > 0) {
    $details_arr = array();
    $details_arr["placesQuestions"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $details_item = array(
            "id" => $id,
            "question" => $question,
            "answer"=>$answer,
        );

        array_push($details_arr['placesQuestions'], $details_item);
    }

    http_response_code(200);
    echo json_encode($details_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No places questions posted yet.")
    );
}
  

