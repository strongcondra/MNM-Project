<?php
require_once('../../includes/settings.php');
header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
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
$cafe_id = $_GET['cafe_id'];
$sql = 'SELECT pf.*, p.name as packageName FROM package_food pf, package p where pf.cafe_id = '.$cafe_id.' and pf.pid = p.id';
$result = $mysqli->query($sql);

// Associative array
$row = $result->fetch_all(MYSQLI_ASSOC);

// $arr = [];

// foreach($row as $res){
//     if($res['type']=='veg'){
//       $arr['veg'][] =     array(
//             'packageId'=>$res['id'],
// 'packageName'=>$res['name'],
// 'details'=>$res['details'],
// 'price'=>$res['price'],
// 'starter'=>$res['starter'],
// 'mains'=>$res['mains'],
// 'desserts'=>$res['desserts'],
//         );
//     }
//      else{
//         $arr['nonveg'][] =     array(
//             'packageId'=>$res['id'],
// 'packageName'=>$res['name'],
// 'details'=>$res['details'],
// 'price'=>$res['price'],
// 'starter'=>$res['starter'],
// 'mains'=>$res['mains'],
// 'desserts'=>$res['desserts'],
//         );
        
//     }
   
// }

if(count($row)>0){
    $arr1 = array('data'=>$row,'status'=>'success');
}
else{
    $arr1 = array('data'=>'No data found','status'=>'failed');
}
}

echo json_encode($arr1);

?>