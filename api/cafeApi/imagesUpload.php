<?php
header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
require_once('../../includes/settings.php');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

// Create connection
$mysqli = new mysqli($database_host, $database_user, $database_user_password,$database_name);

// Check connection
if ($mysqli->connect_error) {
    $arr = array('data'=>"Connection failed: " . $conn->connect_error,'status'=>'failed');
}
else{

$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];
$place = $_POST['place'];
$userid = $_POST['userid'];
		
if(empty($fileName))
{
	$errorMSG = json_encode(array("data" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = '../../images/cafe/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png','JPEG', 'JPG', 'PNG', 'bmp'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $fileName))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
				 move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
			}
			else{		
				$errorMSG = json_encode(array("data" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("data" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("data" => "Sorry, only JPG, JPEG, PNG files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}
}	
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$query = $mysqli->query('INSERT into photos (userid,image,place_name) VALUES("'.$userid.'","'.$fileName.'","'.$place.'")');
	
// 	if ($query === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $mysqli->error;
// }
			
	echo json_encode(array("data" => "Image Uploaded Successfully", "status" => true));	
}



?>