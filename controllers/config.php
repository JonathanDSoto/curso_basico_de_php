<?php 
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
	
?>