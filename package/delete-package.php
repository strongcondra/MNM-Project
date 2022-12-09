<?php
	if(file_exists("../includes/settings.php")) require_once("../includes/settings.php");
	else exit("<center><h2>file missing</h2></center>");
	if(file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
	else exit("<center><h2>file missing</h2></center>");

	//FOR AUTHENTICATED USERS ONLY
	if(!is_authenticated()){
		update_user("index.php", "loging first");
	}
    if(isset($_GET['id']) && delete_package($_GET['id'])){
        update_user("", "Successfully Deleted");
    }
    
    function delete_package($id){
        if (is_authenticated() && !empty($id)) {

            $statement = get_connection()->prepare("DELETE  FROM `package_details` WHERE `id` = ? ");
            $statement->execute([$id]);
            return (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1);         
        }
        return false;
    }


?>