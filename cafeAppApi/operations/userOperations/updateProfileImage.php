<?php
// required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
include_once '../../config/database.php';
include_once '../../objects/users.php';

// get database connection
$database = new CafeDb();
$db = $database->getConnection();
$data = json_decode(file_get_contents("php://input"));
$user = new Users($db);

$image = $_FILES['image']['name'];
$phone = $_POST['phone'];

$imagePath = '../../../images/cafe/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

$user->profilePicture =$image;
move_uploaded_file($tmp_name, $imagePath);


$user->user_mobile = $phone;


//==========================UPLOADING THE IMAGE========================


// update the product
if ($user->updateUserImage()) {
    http_response_code(200);
    echo json_encode(array(
        "message" => "User was updated.",
        "imageName"=>$image,
        "phone"=>$phone
    ));
}
else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update user."));
}
