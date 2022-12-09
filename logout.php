<?php
	if(file_exists('./includes/settings.php')) require_once('./includes/settings.php');
    else exit("<center><h2>file missing</h2></center>");

	$_SESSION = array();

	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time() - 86400, "/");
	}

	session_destroy();
	header("Location: " . $base_url);
	exit;
?>