<?php
    if(file_exists('../includes/settings.php')) require_once('../includes/settings.php');
    else exit("<center><h2>file 22 missing</h2></center>");
    if(file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
    else exit("<center><h2>file missing</h2></center>");

   
    if(!(is_authenticated() )){
        update_user("", "login first");
    }
   
    if(isset($_GET['id']) && delete_place_review($_GET['id'])){
        update_user("", "Successfully Deleted");
    }


    ?>