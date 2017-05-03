<?php

include_once 'model/Database.php';

if(isset($_POST['id'])){
	$id = $_POST['id'];


	try{
		$deleteQuery = "DELETE FROM todos
						WHERE id = :id";

		$statement = $conn->prepare($deleteQuery);
		$statement->execute(array(":id" => $id));

		if($statement){
			echo "Task deleted successfully";
		}

	} catch(PDOException $ex){
		echo "An error occurred " . $ex->getMessage();
	}

}


?>