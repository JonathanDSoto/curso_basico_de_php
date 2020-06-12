<?php 
	include "config.php";  

	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'login':
				login();
				break;
			
			default:
				# code...
				break;
		}
	}
	if (isset($_GET)) {
		if (isset($_GET['logout'])) {
			session_destroy();
			header("Location:".BASE_PATH);
		}
	}

	function login(){

		if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {

			if (true) {//si el login es correcto
				$_SESSION['id'] = 1;
				$_SESSION['nombre'] = 'Juanito';
				$_SESSION['apellido']= 'León';
				$_SESSION['rol']= 'Administrador';

				header("Location:".BASE_PATH."cursos");
			}else{

			}
		}

		
	}
	

?>