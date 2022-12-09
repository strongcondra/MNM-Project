<?php
    if(file_exists('../includes/settings.php')) require_once('../includes/settings.php');
    else exit("<center><h2>file 22 missing</h2></center>");
    if(file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
    else exit("<center><h2>file missing</h2></center>");

    //ONLY ACCESSIBLE TO ADMINISTRATIVE USERS
    if(!(authenticated() )){
        update_user("", "login first");
    }
   
    if(isset($_GET['user_id']) && delete_user($_GET['user_id'])){
        update_user("", "Successfully Deleted");
    }
    
    function delete_user($user_id){
        if (authenticated() && !empty($user_id)) {

            $statement = get_connection()->prepare("DELETE  FROM `users` WHERE `user_id` = ? ");
            $statement->execute([$user_id]);
            return (!isset($statement->errorInfo() [2]) && $statement->rowCount() == 1);         
        }
        return false;
    }


?>