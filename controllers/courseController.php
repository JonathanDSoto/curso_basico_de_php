<?php 
	include "config.php";  
	include "connectionController.php";

	

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
						
						header("Location:".BASE_PATH.'cursos/?ok');

					}else
						header("Location:".BASE_PATH.'cursos/?error');

				}else
					header("Location:".BASE_PATH.'cursos/?error');

			}else
				header("Location:".BASE_PATH.'cursos/?error');
		}
	}
?>