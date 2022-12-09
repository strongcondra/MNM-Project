<?php
require_once('../../includes/settings.php');
header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    $arr1 = array('data'=>'Post request accepted only','status'=>'failed');
    echo json_encode($arr1);
    die();
}
// Create connection
$mysqli = new mysqli($database_host, $database_user, $database_user_password,$database_name);

// Check connection
if ($mysqli->connect_error) {
    $arr = array('data'=>"Connection failed: " . $conn->connect_error,'status'=>'failed');
}
else{
    $data = json_decode(file_get_contents('php://input'), true);
    
    if(isset($data['foods'])){
        $isOrderSaved = 0;
        $last_order_id = 0;
        for($i=0;$i<count($data['foods']);$i++){
            
            $totalAmount = $data['totalAmount']??0;
            
            $package = $data['foods'][$i];
            $packageid = $package['packageid'];
            $price = $package['price'];
            $qty = $package['qty'];
            $placeName = $package['placeName'];
            $cafe_id = $package['placeid'];
            $phone = $package['phone'];
            $items = $package['items'];
            
            if($isOrderSaved==0){
                $save_orders = "INSERT INTO `package_orders`(`phone_no`, `total_amount`, `cafe_id`, `pay_status`) VALUES ('".$phone."','".$totalAmount."','".$cafe_id."','1')";
                
                $query = $mysqli->query($save_orders);
                $last_order_id = $mysqli->insert_id;
                $isOrderSaved= 1;
            }
            $last_package_id = 0;
            if($last_order_id!=0){
                $saveOrderPackag = "INSERT INTO `ordered_packages`( `order_id`, `package_id`, `price`, `quantity`, `place_name`, `cafe_id`, `phone`) 
                VALUES ('".$last_order_id."','".$packageid."','".$price."','".$qty."','".$placeName."','".$cafe_id."','".$phone."')";
                
                $query2 = $mysqli->query($saveOrderPackag);
                
                $last_package_id = $mysqli->insert_id;
            }
            
            if(count($items)){
                if($last_package_id!=0)
                //
                for($j=0;$j<count($items); $j++){
                    //
                    $foodID = $items[$j]['foodid'];
                    $foodName = $items[$j]['foodName'];
                    $savePackageItems = "INSERT INTO `ordered_items`(  `ordered_pkg_id`, `food_id`, `food_name`) VALUES ('".$last_package_id."','".$foodID."','".$foodName."')";
                     $query2 = $mysqli->query($savePackageItems);
                }
            }
        }
    }  
    $arr1 = array('data'=>"Order placed",'status'=>'success');

}

echo json_encode($arr1);

?>