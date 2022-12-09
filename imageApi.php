<?php
require_once('./includes/settings.php');
header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

// Create connection
$mysqli = new mysqli($database_host, $database_user, $database_user_password,$database_name);

// Check connection
if ($mysqli->connect_error) {
    $arr = array('data'=>"Connection failed: " . $conn->connect_error,'status'=>'failed');
}
else{

// $data = json_decode(file_get_contents("php://input"), true);
// $id = $data['id'];

$sql = 'select image, place_name, user_mobile, date from bookings where status = 0';
$result = $mysqli->query($sql);

// Associative array
$row = $result->fetch_all(MYSQLI_ASSOC);
// $row['image'] = $actual_link.'/'.$row['image'];

if(count($row)>0){
    $arr = array('data'=>$row,'status'=>'success');
}
else{
    $arr = array('data'=>'No data found','status'=>'failed');
}
}

echo json_encode($arr);

?>