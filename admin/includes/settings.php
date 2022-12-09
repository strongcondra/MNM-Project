<?php
	//STARTING THE SESSION
	session_start();
	
	//WHETHER OR NOT TO SHOW ERRORS
	ini_set('display_errors', false);
	ini_set('error_reporting', E_ALL);

	//PATH OF THE SYSTEM RELATIVE TO THE htdocs DIRECTORY
	$base_url = "/mnm/admin/";
	$root_dir = $_SERVER['DOCUMENT_ROOT'] . "/mnm/admin/";
	$client_url = "/";
	$client_dir = $_SERVER['DOCUMENT_ROOT'] . "/mnm/";
	
	//TIMEZONE SETTINGS
	date_default_timezone_set('Africa/Harare');

	//DATABASE CREDENTIALS




    $database_name = "u185060096_mnmapp";
	$database_user = "u185060096_userroot";
	$database_user_password = ':Gz8YXiE37';
	$database_host = "127.0.0.1";
	
	
	


