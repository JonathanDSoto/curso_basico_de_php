<?php 
	include "config.php";  
	include "connectionController.php";

	if (!isset($_SESSION['id'])) {
		header("Location:".BASE_PATH);
	}

	if (isset($_POST['action'])) {
		if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {

			$courseController = new CourseController();

			switch ($_POST['action']) {
				case 'add':
					$name = strip_tags($_POST['name']);
					$description = strip_tags($_POST['description']);
					$cover = strip_tags($_POST['cover']);
					$status = strip_tags($_POST['status']);

					$courseController->store($name,$description,$cover,$status);
				break; 
				case 'update':
					$name = strip_tags($_POST['name']);
					$description = strip_tags($_POST['description']);
					$cover = strip_tags($_POST['cover']);
					$status = strip_tags($_POST['status']);
					$id = strip_tags($_POST['id']);

					$courseController->update($name,$description,$cover,$status,$id);
				break;
				case 'delete':
					$id = strip_tags($_POST['id']);
					echo json_encode($courseController->delete($id));
				break; 
			}
		}
	}

	//crud
	class CourseController
	{

		public $bread = array(
			"main_title" => "Cursos",
			"second_level" => "",
			"add_button" => true
		);

		public function get()
		{
			$conn = connect();
			if (!$conn->connect_error) {
				
				$query = "select * from courses";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();

				$results = $prepared_query->get_result();
				$courses = $results->fetch_all(MYSQLI_ASSOC); 

				if (count($courses)>0) {
					return $courses;
				}else
					return array(); 

			}else
				return array();
		}

		public function store($name,$description,$cover,$status)
		{
			$conn = connect();
			if (!$conn->connect_error) {

				if ($name!="" && $description!="" && $cover!="" && $status!="") {
					
					$query = "insert into courses (name,description,cover,status) values(?,?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssi',$name,$description,$cover,$status);
					if ($prepared_query->execute()) {

						$_SESSION['status'] = 'success';
						$_SESSION['message'] = 'Registro guardado exitosamente.';
						
						header("Location:".BASE_PATH.'cursos/');

					}else{
						
						$_SESSION['status'] = 'error';
						$_SESSION['message'] = 'ocurrio un error durante el proceso de guardado';

						header("Location:".BASE_PATH.'cursos/');
					}

				}else{ 

					$_SESSION['status'] = 'error';
					$_SESSION['message'] = 'verifique la información del formulario';

					header("Location:".BASE_PATH.'cursos/');
				}

			}else{
				$_SESSION['status'] = 'error';
				$_SESSION['message'] = 'verifique la conexión a la base de datos';

				header("Location:".BASE_PATH.'cursos/');
			}
		}

		public function update($name,$description,$cover,$status,$id)
		{
			$conn = connect();
			if (!$conn->connect_error) {
				
				if ($name!="" && $description!="" && $cover!="" && $status!="" && $id!="") {

					$query = "update courses set name = ?, description = ?, cover = ?, status = ? where id = ?";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssii',$name,$description,$cover,$status,$id);
					if ($prepared_query->execute()) {

						$_SESSION['status'] = 'success';
						$_SESSION['message'] = 'Registro actualizado exitosamente.';
						
						header("Location:".BASE_PATH.'cursos/');

					}else{
						
						$_SESSION['status'] = 'error';
						$_SESSION['message'] = 'ocurrio un error durante el proceso de actualizado';

						header("Location:".BASE_PATH.'cursos/');
					}


				}else{ 

					$_SESSION['status'] = 'error';
					$_SESSION['message'] = 'verifique la información del formulario';

					header("Location:".BASE_PATH.'cursos/');
				}

			}else{
				$_SESSION['status'] = 'error';
				$_SESSION['message'] = 'verifique la conexión a la base de datos';

				header("Location:".BASE_PATH.'cursos/');
			}
		}

		public function delete($id)
		{
			
			$conn = connect();
			if (!$conn->connect_error) {

				if ($id!="") {

					$query = "delete from courses where id = ?";
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