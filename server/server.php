<?php
$database	= 'bms';
$username	= 'root';
$host		= 'localhost';
$password	= '';

ini_set('display_errors',1);
error_reporting(E_ALL);
// mysqli_report may not be available if the mysqli extension is missing.
// Guard the call to avoid a fatal error on systems without the extension.
if (function_exists('mysqli_report')) {
	// MYSQLI_REPORT_ERROR is available when mysqli is present.
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
}
// error_reporting(0);

$conn = new mysqli($host,$username,$password,$database);

if($conn->connect_error){
	// connect_error is a property, not a method.
	die("Connection Failed: ". $conn->connect_error);
}

if(!isset($_SESSION)){
	session_start();	
}

if(!isset($_SESSION['username'])){
	header('Location: login.php');
}
  
