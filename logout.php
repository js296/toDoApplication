<?php 
include_once 'model/session.php';
include_once 'model/utilities.php';

session_destroy();
header('location: index.php');

?>