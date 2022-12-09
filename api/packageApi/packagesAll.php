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

$sql = 'SELECT * FROM package_details';
$result = $mysqli->query($sql);

// Associative array
$row = $result->fetch_all(MYSQLI_ASSOC);

$arr = [];

function orgData($typearr){
    $t_arr = [];
    foreach($typearr as $v){
    $t_arr[] = array(
                'packageId'=>$v['id'],
    'packageName'=>$v['name'],
    'details'=>$v['details'],
    'price'=>$v['price'],
    'starter'=>$v['starter'],
    'mains'=>$v['mains'],
    'desserts'=>$v['desserts'],
    'date'=>date_format(date_create($v['create_date']),'Y-m-d'),
    'time'=>date_format(date_create($v['create_date']),'H:i:s'),
            );
    }
    return $t_arr;
}

$vegarr = array_filter($row, function ($v) {
   return $v['type'] == 'veg';
});

$arr['veg'] = orgData($vegarr);

$nonvegarr = array_filter($row, function ($v) {
   return $v['type'] == 'nonveg';
});

$arr['nonveg'] = orgData($nonvegarr);


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
    $arr1 = array('data'=>$arr,'status'=>'success');
}
else{
    $arr1 = array('data'=>'No data found','status'=>'failed');
}
}

echo json_encode($arr1);

?>