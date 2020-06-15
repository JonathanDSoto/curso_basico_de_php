<?php 
	include "config.php";  
	include "connectionController.php";

	if (isset($_POST['action'])) {
		if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {

			$authController = new AuthController();

			switch ($_POST['action']) {
				case 'login':
					//limpiando variables
					$email = strip_tags($_POST['email']) ;
					$password = strip_tags($_POST['password']);
					//ejecutamos la función del controlador
					$authController->login($email,$password);
				break; 
			}
		}
	}

	if (isset($_GET)) {
		if (isset($_GET['logout'])) {
			session_destroy();
			header("Location:".BASE_PATH);
		}
	}

	class AuthController
	{
		private $example = "valor";

		public function login($email,$password){

			$conn = connect();
			if (!$conn->connect_error) {
				if ($email!="" && $password!="") {
					
					$query = "select * from users where email = ? and password = ?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('ss',$email,$password);
					$prepared_query->execute();

					$results = $prepared_query->get_result();
					$user = $results->fetch_all(MYSQLI_ASSOC);

					if (count($user)>0) {
						$user = array_pop($user); 

						$_SESSION['id'] = $user['id'];
						$_SESSION['name'] = $user['name'];
						$_SESSION['lastname'] = $user['lastname'];
						$_SESSION['address'] = $user['address'];
						$_SESSION['phone_number'] = $user['phone_number'];
						$_SESSION['email'] = $user['email'];
						$_SESSION['role'] = $user['role'];

						header("Location:".BASE_PATH."cursos");
					}else
						header("Location:".BASE_PATH."?error"); 

				}else
					header("Location:".BASE_PATH."?error");
			}else
				header("Location:".BASE_PATH."?error");
		}
	} 
	

?>