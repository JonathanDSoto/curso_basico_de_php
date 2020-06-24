<?php 
	error_reporting(0);
	ini_set('display_errors', 0);

	//se crea la sesión
	if (!isset($_SESSION)) {
		session_start();
	} 
	
	//se define una ruta base
	if (!defined("BASE_PATH") ) {
		define("BASE_PATH","http://localhost/class/");
	} 

	//se genera un token
	if (!isset($_SESSION['token'])) {
		$_SESSION['token'] = md5(uniqid(mt_rand(),true));
	}

	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
?>