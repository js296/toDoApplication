<?php

include_once 'Database.php';

if(isset($_POST['name']) && isset($_POST['id'])){
	$name = trim($_POST['name']); //ignore white spaces
	$id = $_POST['id'];

	try{
		$updateQuery = "UPDATE todos SET name = :name
						WHERE id = :id";

		$statement = $conn->prepare($updateQuery);
		$statement->execute(array(":name" => $name, ":id" => $id));

		if($statement){
			echo "Task name updated successfully";
		}

	} catch(PDOException $ex){
		echo "An error occurred " . $ex->getMessage();
	}
}
else if(isset($_POST['description']) && isset($_POST['id'])){
	$description = trim($_POST['description']); //ignore white spaces
	$id = $_POST['id'];

	try{
		$updateQuery = "UPDATE todos SET description = :desc
						WHERE id = :id";

		$statement = $conn->prepare($updateQuery);
		$statement->execute(array(":desc" => $description, ":id" => $id));

		if($statement){
			echo "Task description updated successfully";
		}

	} catch(PDOException $ex){
		echo "An error occurred " . $ex->getMessage();
	}
}

else if(isset($_POST['status']) && isset($_POST['id'])){
	$status = trim($_POST['status']); //ignore white spaces
	$id = $_POST['id'];

	try{
		$updateQuery = "UPDATE todos SET status = :status
						WHERE id = :id";

		$statement = $conn->prepare($updateQuery);
		$statement->execute(array(":status" => $status, ":id" => $id));

		if($statement){
			echo "Task status updated successfully";
		}

	} catch(PDOException $ex){
		echo "An error occurred " . $ex->getMessage();
	}
}

?>