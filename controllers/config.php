<?php 
	if (!isset($_SESSION)) {
		session_start();
	} 
	
	define("BASE_PATH","http://localhost/class/");

	if (!isset($_SESSION['token'])) {
		$_SESSION['token'] = md5(uniqid(mt_rand(),true));
	}
	
?>