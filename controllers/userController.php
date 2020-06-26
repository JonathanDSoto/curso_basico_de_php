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
				case 'update':
					$name = strip_tags($_POST['name']);
					$lastname = strip_tags($_POST['lastname']);
					$address = strip_tags($_POST['address']);
					$phone_number = strip_tags($_POST['phone_number']);
					$email = strip_tags($_POST['email']);
					$role = strip_tags($_POST['role']);
					$id = strip_tags($_POST['id']);

					$userController->update($name,$lastname,$address,$phone_number,$email,$role,$id);
				break;
				case 'delete':
					$id = strip_tags($_POST['id']);
					echo json_encode($userController->delete($id));
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
						
						$_SESSION['status'] = 'success';
						$_SESSION['message'] = 'Registro guardado exitosamente.';
						
						header("Location:".BASE_PATH.'usuarios/');

					}else{
						
						$_SESSION['status'] = 'error';
						$_SESSION['message'] = 'ocurrio un error durante el proceso de guardado';

						header("Location:".BASE_PATH.'usuarios/');
					}

				}else{

					$_SESSION['status'] = 'error';
					$_SESSION['message'] = 'verifique la información del formulario';

					header("Location:".BASE_PATH.'usuarios/');
				}

			}else{
				$_SESSION['status'] = 'error';
				$_SESSION['message'] = 'verifique la conexión a la base de datos';

				header("Location:".BASE_PATH.'usuarios/');
			}
		}

		public function update($name,$lastname,$address,$phone_number,$email,$role,$id)
		{
			$conn = connect();
			if (!$conn->connect_error) {
				
				if ($name!="" && $lastname!="" && $address!="" && $phone_number!="" && $email!="" && $role!="" && $id!="" ) {
					$query = "update users set name = ?, lastname = ?, address = ?, phone_number = ?, email = ?, role = ?  where id = ?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('ssssssi',$name,$lastname,$address,$phone_number,$email,$role,$id);
					if ($prepared_query->execute()) {
						
						$_SESSION['status'] = 'success';
						$_SESSION['message'] = 'Registro actualizado exitosamente.';
						
						header("Location:".BASE_PATH.'usuarios/');

					}else{
						
						$_SESSION['status'] = 'error';
						$_SESSION['message'] = 'ocurrio un error durante el proceso de actualizado';

						header("Location:".BASE_PATH.'usuarios/');
					}


				}else{ 

					$_SESSION['status'] = 'error';
					$_SESSION['message'] = 'verifique la información del formulario';

					header("Location:".BASE_PATH.'usuarios/');
				}

			}else{

				$_SESSION['status'] = 'error';
				$_SESSION['message'] = 'verifique la conexión a la base de datos';

				header("Location:".BASE_PATH.'usuarios/');

			}

		}

		public function delete($id)
		{
			$conn = connect();
			if (!$conn->connect_error) {

				if ($id!="") {

					$query = "delete from users where id = ?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('i',$id);
					if ($prepared_query->execute()) {
						
						$respuesta = array(
						    "code" => 200,
						    'status' => 'success',
						    'message' => 'Registro eliminado exitosamente'
						);
						return $respuesta; 

					}else{ 

						$respuesta = array(
						    "code" => -200,
						    'status' => 'error',
						    'message' => 'ocurrio un error durante el proceso de borrado'
						);
						return $respuesta; 
					}

				}else{  

					$respuesta = array(
					    "code" => -200,
					    'status' => 'error',
					    'message' => 'verifique la información del formulario'
					);
					return $respuesta;
				}

			}else{ 

				$respuesta = array(
				    "code" => -200,
				    'status' => 'error',
				    'message' => 'verifique la conexión a la base de datos'
				);
				return $respuesta; 
			}
		}
	}
	
?>