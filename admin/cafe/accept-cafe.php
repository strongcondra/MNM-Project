<?php
    if(file_exists('../includes/settings.php')) require_once('../includes/settings.php');
    else exit("<center><h2>file missing</h2></center>");
    if(file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
    else exit("<center><h2>file missing</h2></center>");

    //ONLY ACCESSIBLE TO ADMINISTRATIVE USERS
    if(!authenticated()){
        update_user("", "login first");
    }

    if(isset($_GET['id']) && accept_cafe($_GET['id'])){
        update_user("cafe/list-of-pending-cafes.php", "Successfully Accpeted");
    }

     
?>