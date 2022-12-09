<?php
if (file_exists('../includes/settings.php')) require_once('../includes/settings.php');
else exit("<center><h2>file 22 missing</h2></center>");
if (file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
else exit("<center><h2>file missing</h2></center>");

//ONLY ACCESSIBLE TO ADMINISTRATIVE USERS

$booking_id = $_GET['id'];

if (!(authenticated())) {
    update_user("", "login first");
}

if (isset($booking_id) && cancel_booking($_GET['id'])) {
    update_user("", "Successfully Cancelled");
}


function cancel_booking($booking_id)
{
    if (authenticated() && !empty($booking_id)) {
        $statement = get_connection()->prepare("UPDATE `bookings` SET `cancelled` = '1', `status` = '1'  WHERE `booking_id` = ?  LIMIT 1");
        $statement->execute([$booking_id]);

        return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
    }
    return false;
}
