<?php

include_once 'Database.php';

if(isset($_POST['name']) && isset($_POST['description'])){
	$name = $_POST['name'];
	$description = $_POST['description'];

	try{
		$createQuery = "INSERT INTO todos(name, description, created_at) 			
						VALUES(:name, :desc, now())";

		$statement = $conn->prepare($createQuery);
		$statement->execute(array(":name" => $name, ":desc" => $description));

		if($statement){
			echo "Record Inserted";
		}

	} catch(PDOException $ex){
		echo "An error occurred " . $ex->getMessage();
	}

}


?>