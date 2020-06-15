<?php 
	include "config.php";  
	include "connectionController.php";

	if (isset($_POST['action'])) {
		# code...
	}

	class CourseController
	{
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
	}