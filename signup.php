<?php
//add our database connection script
include_once 'model/Database.php';
include_once 'model/utilities.php';
include_once 'view/header.php';

//process the form
if(isset($_POST['signupBtn'])){
    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'username', 'password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('username' => 4, 'password' => 8);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(checkDuplicateEntries("users", "email", $email, $conn)){
    	$result = flashMessage("Email is already taken, log in or choose new email.");
    }

    else if(checkDuplicateEntries("users", "username", $username, $conn)){
    	$result = flashMessage("Username is already taken, log in or choose a new username.");
    }
    //check if error array is empty, if yes process form data and insert record
    else if(empty($form_errors)){
        
        //hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try{

            //create SQL insert statement
            $sqlInsert = "INSERT INTO users (username, email, password, join_date)
              VALUES (:username, :email, :password, now())";

            //use PDO prepared to sanitize data
            $statement = $conn->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

            //check if one new row was created
            if($statement->rowCount() == 1){
                $result = flashMessage("Registration Successful", "Pass");
            }
        }catch (PDOException $ex){
            $result = flashMessage("An error occurred: " .$ex->getMessage());
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = flashMessage("There was 1 error in the form<br>");
        }else{
            $result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page</title>
</head>
<body>
<h2>User Authentication System </h2><hr>

<h3>Registration Form</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<form method="post" action="">
    <table>
        <tr><td>Email:</td> <td><input type="text" value="" name="email" autocomplete="off"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value="" name="username" autocomplete="off"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password" autocomplete="off"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="signupBtn" value="Signup"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>