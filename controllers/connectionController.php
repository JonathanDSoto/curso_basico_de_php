<?php 
	define("HOST", "localhost");
	define("USER", "root");
	define("PASSWORD", "");
	define("BD", "class");

	function connect(){
		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if( $conn){
		     return $conn;
		}	
		return null;
    }

?>