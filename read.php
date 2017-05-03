<?php

include_once('Database.php');

try{
	$readQuery = "SELECT * from todos";
	$statement = $conn->query($readQuery);

	while($todo = $statement->fetch(PDO::FETCH_OBJ)){
		$create_date = strftime("%b %d, %Y", strtotime($todo->created_at));
		$output = "<tr>
                <td title='Click to edit'>
                	<div class='editable' onclick=\"makeElementEditable(this)\"
                	onblur=\"updateTaskName(this, '{$todo->id}')\"> $todo->name
                	</div>
                </td>

                <td title='Click to edit'>
                	<div class='editable' onclick=\"makeElementEditable(this)\"
                	onblur=\"updateTaskDescription(this, '{$todo->id}')\" > $todo->description 
                	</div> 
                </td>

                <td title='Click to edit'> 
                	<div class='editable' onclick=\"makeElementEditable(this)\"
                	onblur=\"updateTaskStatus(this, '{$todo->id}')\">$todo->status 
                	</div> 
                </td>

                <td>$create_date</td>

                <td style=\"width: 5%;\">
                	<button class='btn-danger' onclick=\"deleteTask('{$todo->id}')\">
                		<i class=\"fa fa-times\"></i>
                	</button>
                </td>
            </tr>";

        echo $output;
	}

} catch (PDOException $ex){
	echo "An error occurred " . $ex->getMessage();
}

?>
