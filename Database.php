<?php
$db = NULL;

// Let's connect to a database
// Order of db connection: Heroku mySQL Database --> Local mySQL Database
// Check to see if we are on a Heroku Server by checking for an environmental variable with db data
if (!(getenv('JAWSDB_URL') == null)) {
	
	$dbparts = parse_url(getenv('JAWSDB_URL'));
	$hostname = $dbparts['host'];
	$username = $dbparts['user'];
	$password = $dbparts['pass'];
	$database = ltrim($dbparts['path'],'/');
	
	try {
	    $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
	    // set the PDO error mode to exception
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully";
    }
	catch(PDOException $e) {
  		http_error(500, "Internal Server Error", "We couldn't connect to a Heroku MySQL database.");
  		//echo "Connection failed: " . $e->getMessage();
    }
}
else {
	define("DSN", "mysql:host=localhost;dbname=todoapplication");
	define("USERNAME", "root");
	define("PASSWORD", "password");
	
	try{
	    $conn = new PDO(DSN, USERNAME, PASSWORD, $options);

	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "connection successful";

	}catch (PDOException $ex){
	    echo "A database error occurred ".$ex->getMessage();
	}

