<?php 
	//se crea la sesión
	if (!isset($_SESSION)) {
		session_start();
	} 
	
	//se define una ruta base
	if (!defined("BASE_PATH") ) {
		define("BASE_PATH","http://localhost:8888/");
	} 

	//se genera un token
	if (!isset($_SESSION['token'])) {
		$_SESSION['token'] = md5(uniqid(mt_rand(),true));
	}

	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
?>