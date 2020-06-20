<?php 
	include "config.php";  
	include "connectionController.php";

	if (isset($_POST['action'])) {
		if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {

			$userController = new UserController();

			switch ($_POST['action']) {
				case 'add':
					$name = strip_tags($_POST['name']);
					$lastname = strip_tags($_POST['lastname']);
					$address = strip_tags($_POST['address']);
					$phone_number = strip_tags($_POST['phone_number']);
					$email = strip_tags($_POST['email']);
					$password = strip_tags($_POST['password']);
					$role = strip_tags($_POST['role']);

					$password = md5($password.'pollito');

					$userController->store($name,$lastname,$address,$phone_number,$email,$password,$role);
				break; 
			}
		}
	}

	//obtiene todos los usuarios existentes
	class UserController
	{
		public $bread = array(
			"main_title" => "Usuarios",
			"second_level" => "",
			"add_button" => true
		);

		public function get()
		{
			$conn = connect();
			if (!$conn->connect_error) {
				
				$query = "select * from users";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();

				$results = $prepared_query->get_result();
				$users = $results->fetch_all(MYSQLI_ASSOC); 

				if (count($users)>0) {
					return $users;
				}else
					return array(); 

			}else
				return array();
		}

		public function store($name,$lastname,$address,$phone_number,$email,$password,$role)
		{
			$conn = connect();
			if (!$conn->connect_error) {

				if ($name!="" && $lastname!="" && $address!="" && $phone_number!="" && $email!="" && $password!="" && $role!="") {
					
					$query = "insert into users (name,lastname,address,phone_number,email,password,role) values (?,?,?,?,?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssssss',$name,$lastname,$address,$phone_number,$email,$password,$role);
					if ($prepared_query->execute()) {
						
						header("Location:".BASE_PATH.'usuarios/?ok');

					}else
						header("Location:".BASE_PATH.'usuarios/?error1');

				}else
					header("Location:".BASE_PATH.'usuarios/?error2');

			}else
				header("Location:".BASE_PATH.'usuarios/?error3');
		}
	}
	
?>