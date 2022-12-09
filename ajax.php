<?php
if (file_exists('./includes/settings.php')) require_once('./includes/settings.php');
else exit("<center><h2>file missing</h2></center>");

$mysqli = new mysqli($database_host,$database_user,$database_user_password,$database_name);

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

if (isset($_POST['submit'])) {
    $sts = $_POST['sts'];
    $id = $_POST['id'];
    $table = $_POST['table'];
// echo 'you are reached here';
//$sql = mysql_query('update set status = "'.$sts.'" where booking_id = '.$id);
$sql = 'UPDATE '.$table.' SET status = "'.$sts.'" where id = '.$id;
$arr = [];
if ($mysqli->query($sql) === TRUE) {
  $arr['mes'] = 'success';
} else {
    $arr['mes'] = $mysqli->error;
}
echo json_encode($arr);
}


