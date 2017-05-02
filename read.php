<?php

include_once('Database.php');

try{
	$readQuery = "SELECT * from todos";
	$statement = $conn->query($readQuery);

	while($todo = $statement->fetch(PDO::FETCH_OBJ)){
		$output = "<tr>
                <td><div> $todo->name </div></td>
                <td> <div> $todo->description </div> </td>
                <td> <div>$todo->status </div> </td>
                <td>$todo->created_at</td>
                <td style=\"width: 5%;\"><button><i class=\"btn-danger fa fa-times\"></i></button>
                </td>
            </tr>";

        echo $output;
	}

} catch (PDOException $ex){
	echo "An error occurred " . $ex->getMessage();
}

?>
