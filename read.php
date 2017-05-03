<?php

include_once('Database.php');

try{
	$readQuery = "SELECT * from todos";
	$statement = $conn->query($readQuery);

	while($todo = $statement->fetch(PDO::FETCH_OBJ)){
		$create_date = strftime("%b %d, %Y", strtotime($todo->created_at));
		$output = "<tr>
                <td><div onclick=\"makeElementEditable(this)\" 
                onblur=\"updateTaskName(this, '{$todo->id}')\"> $todo->name </div></td>

                <td> <div onclick=\"makeElementEditable(this)\" 
                onblur=\"updateTaskDescription(this, '{$todo->id}')\" > $todo->description </div> </td>

                <td> <div onclick=\"makeElementEditable(this)\" 
                onblur=\"updateTaskStatus(this, '{$todo->id}')\">$todo->status </div> </td>

                <td>$create_date</td>

                <td style=\"width: 5%;\"><button><i class=\"btn-danger fa fa-times\"></i></button>
                </td>
            </tr>";

        echo $output;
	}

} catch (PDOException $ex){
	echo "An error occurred " . $ex->getMessage();
}

?>
